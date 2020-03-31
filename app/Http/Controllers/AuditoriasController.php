<?php

namespace App\Http\Controllers;
use App\Auditorias;
use App\Auditores;
use App\Http\Requests\AuditoriasRequest;

use Illuminate\Http\Request;

use DB;


class AuditoriasController extends Controller
{

    public function loadAuditorias()
    {
        $auditorias = Auditorias::all();
        return response()->json($auditorias);
    }

    public function getAuditores(Request $id_audit)
    {
        $auditores = Auditores::where('id_auditoria', $id_audit->id_audit)->get();

        return response()->json($auditores);
    }

    public function insertAuditorias(AuditoriasRequest $request)
    {
        Auditorias::create($request->all());  
        return response()->json(true);
    }

    public function updateAuditorias(AuditoriasRequest $request)
    {
        $auditorias = Auditorias::where('id', $request->id)->first();
        $auditorias->fill($request->all());
        $auditorias->save();

       $nome = $request->nome;

       if($nome <> ''){
            Auditores::create($request->all());  
        }
        return response()->json(true);

    }

    public function deleteAuditorias(Request $request)
    {
        Auditorias::where('id', $request->id)->delete();
        Auditores::where('id_auditoria', $request->id)->delete();
        return response()->json(true);
    }

    public function deleteAuditor(Request $request)
    {
        Auditores::where('id_auditor', $request->id_auditor)->delete();
        return response()->json(true);
    }
}
