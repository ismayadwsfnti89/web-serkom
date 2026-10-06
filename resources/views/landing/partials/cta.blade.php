<section class="section" style="padding-top: 0;">
    <div class="container">
        <div class="cta-box fade-in-up">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-3 mb-lg-0">
                    <h2>Bergabung Bersama Kami</h2>
                    <p class="mb-0">
                        Jadilah bagian dari keluarga besar {{ $profil->nama_sekolah ?? 'sekolah kami' }}.
                        Daftarkan putra-putri Anda untuk masa depan yang lebih cerah.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    {{-- Tombol ganti ke WhatsApp / Telepon / Info PPDB --}}
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profil->kontak ?? '6281234567890') }}"
                    target="_blank"
                    class="btn-cta">
                        <i class="bi bi-whatsapp me-2"></i>Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
    .cta-box {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: 20px;
        padding: 48px;
        color: #fff;
        position: relative;
        overflow: hidden;
    }
    .cta-box::before {
        content: '';
        position: absolute;
        top: -100px; right: -100px;
        width: 300px; height: 300px;
        background: rgba(212,160,23,0.15);
        border-radius: 50%;
    }
    .cta-box::after {
        content: '';
        position: absolute;
        bottom: -80px; left: -80px;
        width: 200px; height: 200px;
        background: rgba(255,255,255,0.05);
        border-radius: 50%;
    }
    .cta-box h2 {
        font-size: 1.75rem;
        font-weight: 800;
        margin-bottom: 12px;
        position: relative;
    }
    .cta-box p {
        opacity: 0.9;
        position: relative;
        font-size: 0.95rem;
    }
    .btn-cta {
        background: var(--accent);
        color: var(--dark);
        padding: 14px 32px;
        border-radius: 12px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        position: relative;
        transition: all 0.3s;
    }
    .btn-cta:hover {
        background: #fff;
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        color: var(--primary);
    }
    @media (max-width: 768px) {
        .cta-box { padding: 32px 24px; }
        .cta-box h2 { font-size: 1.4rem; }
    }
</style>
@endpush