<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'document_type_id' => 'required|exists:document_types,id',
            'documentable_id' => 'required|integer',
            'documentable_type' => 'required|string',
            'file' => 'required|file',
        ]);

        $documentType = DocumentType::findOrFail($request->document_type_id);

        // Validate file size
        $maxBytes = $documentType->max_size_mb * 1024 * 1024;
        if ($request->file('file')->getSize() > $maxBytes) {
            return response()->json([
                'success' => false,
                'message' => "El archivo excede el tamaño máximo permitido de {$documentType->max_size_mb} MB.",
            ], 422);
        }

        // Validate mime type
        $allowedMimes = $documentType->allowed_mime_types ?? [];
        if (!empty($allowedMimes) && !in_array($request->file('file')->getMimeType(), $allowedMimes)) {
            return response()->json([
                'success' => false,
                'message' => 'El tipo de archivo no está permitido.',
            ], 422);
        }

        $file = $request->file('file');
        $path = $file->store('documents/' . $request->documentable_type, 'public');

        $document = Document::create([
            'document_type_id' => $request->document_type_id,
            'documentable_id' => $request->documentable_id,
            'documentable_type' => $request->documentable_type,
            'file_path' => $path,
            'original_name' => $file->getClientOriginalName(),
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'uploaded_by' => auth()->id(),
        ]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Documento subido correctamente.',
                'document' => $document->load('documentType'),
            ]);
        }

        return back()->with([
            'message' => 'Documento subido correctamente.',
            'type' => 'success',
        ]);
    }

    /**
     * Download the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function download(Document $document)
    {
        if (!Storage::disk('public')->exists($document->file_path)) {
            abort(404, 'Archivo no encontrado.');
        }

        return Storage::disk('public')->download($document->file_path, $document->original_name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        Storage::disk('public')->delete($document->file_path);
        $document->delete();

        if (request()->ajax() || request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Documento eliminado correctamente.',
            ]);
        }

        return back()->with([
            'message' => 'Documento eliminado correctamente.',
            'type' => 'success',
        ]);
    }
}
