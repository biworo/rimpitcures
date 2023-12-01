<div class="section-wrapper bg-light client" id="klien">
    <div class="section-title ">
        <h2>Client</h2>
    </div>
    <div class="client-section text-center">
        <div class="container">
            <div class="mt-2 mb-4 text-left">
                <p class="mt-2 mb-5 text-muted">
                    Kami bangga telah bekerja sama dengan berbagai klien terkemuka dari berbagai industri.
                    Bersama-sama, kami menciptakan kisah sukses yang menginspirasi. Terima kasih atas
                    kepercayaan Anda!
                </p>
            </div>
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach (config('rims.clients') as $client)
                        <div class="swiper-slide">
                            <img src="/img/clients/{{ $client }}" class="img" />
                        </div>
                    @endforeach
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>

    </div>
</div>