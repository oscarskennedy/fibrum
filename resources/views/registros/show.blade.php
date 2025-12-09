<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Resumen - {{ $registro->folio }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <div class="container">
    <h2>Resumen del registro — Folio: {{ $registro->folio }}</h2>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
      <tbody>
        <tr><th>Nombre completo</th><td>{{ $registro->nombre_completo }}</td></tr>
        <tr><th>CURP</th><td>{{ $registro->curp }}</td></tr>
        <tr><th>RFC</th><td>{{ $registro->rfc }}</td></tr>
        <tr><th>Ocupación</th><td>{{ $registro->ocupacion }}</td></tr>
        <tr><th>Puesto</th><td>{{ $registro->puesto }}</td></tr>
        <tr><th>Razón social</th><td>{{ $registro->razon_social }}</td></tr>
        <tr><th>Curso</th><td>{{ $registro->nombre_curso }}</td></tr>
        <tr><th>Duración</th><td>{{ $registro->duracion_curso }}</td></tr>
        <tr><th>Fecha</th><td>{{ $registro->dia_inicio }} → {{ $registro->dia_final }} / {{ $registro->mes_ejecucion }} {{ $registro->anio_ejecucion }}</td></tr>
        <tr><th>Área temática</th><td>{{ $registro->area_tematica }}</td></tr>
        <tr><th>Agente capacitador</th><td>{{ $registro->agente_capacitador }}</td></tr>
        <tr><th>Representante legal</th><td>{{ $registro->representante_legal }}</td></tr>
        <tr><th>Representante trabajadores</th><td>{{ $registro->representante_trabajadores }}</td></tr>
      </tbody>
    </table>

    <div class="mt-3">

      <!-- Botón modal -->
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#qrModal">
        Mostrar QR del DC-3
      </button>

      <!-- Botón para descargar PDF -->
      <a href="{{ route('registros.dc3', $registro->folio) }}" class="btn btn-danger">
        Descargar DC-3
      </a>

    </div>
  </div>

  
  <div class="modal fade" id="qrModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Código QR del DC-3</h5>
          <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body text-center">
          <p>Escanea este código con tu celular para abrir el DC-3:</p>

          <div class="d-flex justify-content-center">
            {!! QrCode::size(260)->generate($urlPdf) !!}
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
