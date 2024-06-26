<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">integration</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ 'employee' }}">employee</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ 'showTimeCard' }}">timecard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ 'showTimeMachine' }}">TimeMachine</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ 'showAbsence' }}">Absence</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>

<div class="button-group">
    <form action="{{ route('RunGetgetTimeCard') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Run timecard</button>
    </form>

    <form action="{{ route('RunGetEmployee') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Run employee</button>
    </form>

    <form action="{{ route('RunGetTimemeMachine') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Run TimeMachine</button>
    </form>
    <form action="{{ route('RunGetAbsence') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Run Absence</button>
    </form>
</div>
<style>
    .button-group form {
        display: inline-block;
        margin-right: 10px;
    }
</style>
