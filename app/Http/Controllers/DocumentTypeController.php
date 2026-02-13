<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDocumentTypeRequest;
use App\Http\Requests\UpdateDocumentTypeRequest;

class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentTypes = DocumentType::orderBy('name')->get();

        return view('document-types.index')
            ->with('documentTypes', $documentTypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('document-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDocumentTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentTypeRequest $request)
    {
        $data = $request->validated();

        if (isset($data['allowed_mime_types']) && is_string($data['allowed_mime_types'])) {
            $data['allowed_mime_types'] = array_map('trim', explode(',', $data['allowed_mime_types']));
        }

        $documentType = DocumentType::create($data);

        if ($documentType) {
            return redirect(route('document-types.index'))->with([
                'message' => 'Tipo de documento creado correctamente.',
                'type' => 'success',
            ]);
        }

        return redirect(route('document-types.index'))->with([
            'message' => 'Ocurrió un error al crear el tipo de documento.',
            'type' => 'danger',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocumentType  $documentType
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentType $documentType)
    {
        return view('document-types.show')
            ->with('documentType', $documentType);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocumentType  $documentType
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentType $documentType)
    {
        return view('document-types.edit')
            ->with('documentType', $documentType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocumentTypeRequest  $request
     * @param  \App\Models\DocumentType  $documentType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentTypeRequest $request, DocumentType $documentType)
    {
        $data = $request->validated();

        if (isset($data['allowed_mime_types']) && is_string($data['allowed_mime_types'])) {
            $data['allowed_mime_types'] = array_map('trim', explode(',', $data['allowed_mime_types']));
        }

        $documentType->update($data);

        return redirect(route('document-types.index'))->with([
            'message' => 'Tipo de documento actualizado correctamente.',
            'type' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocumentType  $documentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentType $documentType)
    {
        if ($documentType->documents()->count() > 0) {
            return redirect(route('document-types.index'))->with([
                'message' => 'No se puede eliminar el tipo de documento porque tiene documentos asociados.',
                'type' => 'danger',
            ]);
        }

        $documentType->delete();

        return redirect(route('document-types.index'))->with([
            'message' => 'Tipo de documento eliminado correctamente.',
            'type' => 'success',
        ]);
    }
}
