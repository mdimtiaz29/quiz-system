@extends('layout')
@section('title','Certificate')

@section('main')

<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light container">
    <div class="certificate-container p-5 text-center shadow-lg bg-white rounded-4 position-relative" id="certificate" style="cursor:pointer;">
        
        <h2 class="fw-bold mb-4 text-primary">Certificate of Achievement</h2>
        
        <p class="fs-5 mb-1">This is proudly presented to</p>
        <h3 class="fw-bold mb-3">{{ $name }}</h3>

        <p class="fs-5 mb-4">For successfully completing the quiz:</p>
        <h4 class="fw-semibold mb-4">{{ str_replace('-', ' ', $quiz) }} 
        </h4>
<span class="text-muted fs-6">{{ date('M j, Y') }}</span>
        <blockquote class="fst-italic text-muted">"Nothing worth having comes easy." - Theodore Roosevelt</blockquote>
        
        

        <!-- Optional decorative elements -->
        <div class="position-absolute bottom-0 start-0 p-3 text-muted" style="font-size: 0.8rem;">Quiz-System</div>
    </div>
    <div class="container text-center">
            <button class="btn btn-success" onclick="downloadCertificate()">Download Certificate</button>
        </div>
</div>

<!-- JS for downloading certificate as image -->
<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
<script>
function downloadCertificate() {
    const certificate = document.getElementById('certificate');
    html2canvas(certificate).then(canvas => {
        const link = document.createElement('a');
        link.download = '{{ $name }}-certificate.png';
        link.href = canvas.toDataURL();
        link.click();
    });
}
</script>

<style>
.certificate-container {
    width: 800px;
    background: linear-gradient(145deg, #fdfcfb, #e2f0fb);
    border: 10px solid #0d6efd;
}
</style>

@endsection
