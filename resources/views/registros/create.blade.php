<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registrar curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h2>Registro de curso</h2>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('registros.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Folio</label>
            <input class="form-control" name="folio" value="{{ old('folio') }}" required>
        </div>

        <div class="mb-3">
            <label>Nombre completo empezando por apellido</label>
            <input class="form-control" name="nombre_completo" value="{{ old('nombre_completo') }}" required>
        </div>

        <div class="mb-3 row">
            <div class="col">
                <label>CURP</label>
                <input class="form-control" name="curp" value="{{ old('curp') }}" required>
            </div>
            <div class="col">
                <label>RFC</label>
                <input class="form-control" name="rfc" value="{{ old('rfc') }}" required>
            </div>
        </div>

        
        <div class="mb-3">
            <label>Ocupación</label>
            <input class="form-control" name="ocupacion" value="{{ old('ocupacion') }}" required>
        </div>

        <div class="mb-3">
            <label>Puesto</label>
            <input class="form-control" name="puesto" value="{{ old('puesto') }}" required>
        </div>

        <div class="mb-3">
            <label>Razón social</label>
            <input class="form-control" name="razon_social" value="{{ old('razon_social') }}" required>
        </div>

        <div class="mb-3">
            <label>Nombre del curso</label>
            <input class="form-control" name="nombre_curso" value="{{ old('nombre_curso') }}" required>
        </div>

        <div class="mb-3 row">
            <div class="col">
                <label>Duración en horas</label>
                <input class="form-control" name="duracion_curso" value="{{ old('duracion_curso') }}" required>
            </div>
            <div class="col">
                <label>Año</label>
                <input class="form-control" name="anio_ejecucion" value="{{ old('anio_ejecucion') }}" required>
            </div>
        </div>

        <div class="mb-3 row">
            <div class="col">
                <label>Mes (en numero)</label>
                <input class="form-control" name="mes_ejecucion" value="{{ old('mes_ejecucion') }}" required>
            </div>
            <div class="col">
                <label>Día inicio</label>
                <input class="form-control" name="dia_inicio" value="{{ old('dia_inicio') }}" required>
            </div>
            <div class="col">
                <label>Día final</label>
                <input class="form-control" name="dia_final" value="{{ old('dia_final') }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Área temática</label>
            <input class="form-control" name="area_tematica" value="{{ old('area_tematica') }}" required>
        </div>

        <div class="mb-3">
            <label>Agente capacitador</label>
            <input class="form-control" name="agente_capacitador" value="{{ old('agente_capacitador') }}" required>
        </div>

        <div class="mb-3">
            <label>Representante legal</label>
            <input class="form-control" name="representante_legal" value="{{ old('representante_legal') }}" required>
        </div>

        <div class="mb-3">
            <label>Representante de los trabajadores</label>
            <input class="form-control" name="representante_trabajadores" value="{{ old('representante_trabajadores') }}" required>
        </div>

        <button class="btn btn-primary">Guardar</button>
    </form>
</div>
</body>
</html>
