<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistroCurso;
use Illuminate\Database\QueryException;
use App\pdf\CustomFPDF as Fpdi;


class RegistroCursoController extends Controller
{
    public function create()
    {
        return view('registros.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'folio' => 'required|string|unique:registros_cursos,folio|max:20',
            'nombre_completo' => 'required|string|max:150',
            'curp' => 'required|string|max:18',
            'ocupacion' => 'required|string|max:100',
            'puesto' => 'required|string|max:100',
            'razon_social' => 'required|string|max:150',
            'rfc' => 'required|string|max:13',
            'nombre_curso' => 'required|string|max:150',
            'duracion_curso' => 'required|string|max:50',
            'anio_ejecucion' => 'required|string|max:4',
            'mes_ejecucion' => 'required|string|max:10',
            'dia_inicio' => 'required|string|max:2',
            'dia_final' => 'required|string|max:2',
            'area_tematica' => 'required|string|max:150',
            'agente_capacitador' => 'required|string|max:150',
            'representante_legal' => 'required|string|max:150',
            'representante_trabajadores' => 'required|string|max:150',
        ]);
        
$validated['user_id'] = auth()->id();

        try {
            $registro = RegistroCurso::create($validated);
            return redirect()->route('registros.show', $registro->folio)
                             ->with('success', 'Guardado correctamente');
        } catch (QueryException $e) {
            return back()->withErrors(['folio' => 'Error al guardar (folio duplicado o problema en BD)'])
                         ->withInput();
        }
    }

    public function show($folio)
    {
        $registro = RegistroCurso::where('folio', $folio)->firstOrFail();
        
        $urlPdf = route('registros.dc3', $registro->folio);
        return view('registros.show', compact('registro', 'urlPdf'));
    }

    public function generarDC3($folio)
    {
        $registro = RegistroCurso::where('folio', $folio)->firstOrFail();

        $pdf = new Fpdi();

        // RUTA DEL PDF 
        $path = storage_path('app/public/DC3.pdf');

        // Cargar plantilla
        $pdf->setSourceFile($path);
        $tpl = $pdf->importPage(1);

        // Tamaño Carta en mm
        $width_mm  = 215.9;
        $height_mm = 279.4;

        // Crear página con tamaño EXACTO
        $pdf->AddPage('P', [$width_mm, $height_mm]);

        // Usar plantilla
        $pdf->useTemplate($tpl, 0, 0, $width_mm, $height_mm);

        // Estilos base
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->SetTextColor(0, 0, 0);

        // ==============================
        //  LLENADO DE CAMPOS DC-3
        // ==============================

        // Folio
        $pdf->SetXY(170, 18);
        $pdf->SetFont('Helvetica', 'B', 11);
        $pdf->Cell(40, 6, $registro->folio, 0, 0, 'R');
        $pdf->SetFont('Helvetica', '', 10);

        // Nombre completo
        $pdf->SetXY(18, 75);
        $pdf->MultiCell(180, 5, utf8_decode($registro->nombre_completo));

        // CURP
        $pdf->SetXY(18, 84);
        $pdf->Cell(60, 5, utf8_decode($registro->curp));
        $pdf->SetCharSpacing(1.6);

        // Ocupación
        $pdf->SetXY(120, 84);
        $pdf->Cell(90, 5, utf8_decode($registro->ocupacion));

        // Puesto
        $pdf->SetXY(18, 94);
        $pdf->Cell(60, 5, utf8_decode($registro->puesto));

        // Razón social
        $pdf->SetXY(23, 114);
        $pdf->MultiCell(120, 5, utf8_decode($registro->razon_social));

        // RFC
        $pdf->SetXY(23, 125);
        $pdf->Cell(55, 5, utf8_decode($registro->rfc));

        // Nombre curso
        $pdf->SetXY(18, 144);
        $pdf->MultiCell(120, 5, utf8_decode($registro->nombre_curso));

        // Duración
        $pdf->SetXY(23, 154);
        $pdf->Cell(40, 5, utf8_decode($registro->duracion_curso));

        // Año inicio
        $pdf->SetXY(92, 154);
        $pdf->Cell(20, 5, $registro->anio_ejecucion);
        $pdf->SetCharSpacing(4);
        // Mes INICIO 
        $pdf->SetXY(114, 154);
        $pdf->Cell(40, 5, utf8_decode($registro->mes_ejecucion));

        // Día inicio
        $pdf->SetXY(132, 154);
        $pdf->Cell(15, 5, $registro->dia_inicio);

        // AÑO final
        $pdf->SetXY(156, 154);
        $pdf->Cell(30, 5, $registro->anio_ejecucion);
        $pdf->SetCharSpacing(1.7);
        // MES final
        $pdf->SetXY(178, 154);
        $pdf->Cell(40, 5, utf8_decode($registro->mes_ejecucion));

        // Día final
        $pdf->SetXY(196, 154);
        $pdf->Cell(15, 5, $registro->dia_final);
        

        // Área temática
        $pdf->SetXY(18, 162);
        $pdf->MultiCell(180, 5, utf8_decode($registro->area_tematica));

        // Agente capacitador
        $pdf->SetXY(18, 172);
        $pdf->MultiCell(180, 5, utf8_decode($registro->agente_capacitador));


        // Salida del PDF
        return response($pdf->Output('S'), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="DC3_' . $registro->folio . '.pdf"');
    }
}
