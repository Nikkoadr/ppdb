@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Tes Minat Bakat Kompetensi Keahlian SMK Muhammadiyah Kandanghaur</h4>
    </div>

    <div class="card p-4 question-card">
        <form id="question-form">
            <h5 id="question-title"></h5>
            <p id="question-text"></p>
            <div id="options-container"></div>

            <div class="d-flex justify-content-between align-items-center">
                <button type="button" class="btn btn-outline-primary" id="prevBtn" disabled>
                    <i class="bi bi-arrow-left"></i> Previous
                </button>
                <div class="text-muted" id="progress-text">Question 1 of {{ count($soal) }}</div>
                <button type="button" class="btn btn-primary" id="nextBtn">
                    Next <i class="bi bi-arrow-right"></i>
                </button>
            </div>

            <div class="progress mt-3">
                <div class="progress-bar bg-primary" id="progress-bar" style="width: 0%"></div>
            </div>
        </form>
    </div>
</div>
@endsection
