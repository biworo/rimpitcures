<div class="section-wrapper bg-dark" id="portfolio">
    <div class="section-title">
        <h2>Portfolio</h2>
    </div>
    <div class="section-content portfolios">
        <div class="container-fluid">
            <div class="tab mt-3">
                <button class="btn btn-primary active" data-filter="all">All</button>
                <button class="btn btn-primary" data-filter="foto">Foto</button>
                <button class="btn btn-primary" data-filter="video">Video</button>
            </div>
            <div class="d-flex g-0 mt-5 portfolio-grid justify-center text-align-center" id="portfolioGrid">
                @foreach (config('rims.portfolios') as $rim)
                    @if ($rim['type'] == 'foto')
                        <div class="grid-item thumbnail {{ $rim['type'] }}">
                            <a href="#">
                                <img src="/img/portfolios/{{ $rim['thumb'] }}" class="w-100" alt="Foto Thumbnail 1">
                            </a>
                        </div>
                    @else
                        <div class="grid-item thumbnail {{ $rim['type'] }}">
                            <iframe width="560" height="315" src="{{ $rim['thumb'] }}" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

@once
    @push('bottom-script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/packery/2.1.2/packery.pkgd.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const tabButtons = document.querySelectorAll('.tab button');
                const portfolioGrid = document.getElementById('portfolioGrid');
                const modalBody = document.getElementById('thumbnailModalBody');

                // Function to calculate the number of columns based on the screen width
                function getNumberOfColumns() {
                    const screenWidth = window.innerWidth;
                    if (screenWidth >= 992) {
                        return 3; // For large screens (lg) and above, use 3 columns
                    } else if (screenWidth >= 768) {
                        return 3; // For medium screens (md), use 2 columns
                    } else {
                        return 1; // For small screens (sm) and below, use 1 column
                    }
                }

                // Initialize Packery layout with dynamic column count
                const packery = new Packery(portfolioGrid, {
                    itemSelector: '.thumbnail',
                    percentPosition: true,
                    gutter: 0, // Set the gap between thumbnails
                    columnWidth: '.grid-sizer',
                    transitionDuration: 200
                });

                // Create and append the grid sizer element
                const gridSizer = document.createElement('div');
                gridSizer.className = 'grid-item grid-sizer';
                portfolioGrid.appendChild(gridSizer);

                // Function to set the number of columns based on screen width and adjust the layout
                function setPackeryColumns() {
                    const columns = getNumberOfColumns();
                    // const columns = 3;
                    gridSizer.style.width = `${100 / columns}%`;
                    packery.options.columnWidth = `.grid-sizer`;
                    packery.layout();
                }

                // Call setPackeryColumns on page load
                setPackeryColumns();

                // Call setPackeryColumns when the window is resized
                window.addEventListener('resize', setPackeryColumns);

                // Filter portfolio items on tab click
                tabButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        tabButtons.forEach(btn => btn.classList.remove('active'));
                        this.classList.add('active');
                        const filter = this.getAttribute('data-filter');

                        const thumbnails = portfolioGrid.querySelectorAll('.thumbnail');
                        thumbnails.forEach(thumbnail => {
                            if (filter === 'all' || thumbnail.classList.contains(filter)) {
                                thumbnail.style.display = 'block';
                            } else {
                                thumbnail.style.display = 'none';
                            }
                        });

                        // Adjust the layout after filtering
                        packery.layout();
                    });
                });

                // Show modal content when thumbnail clicked
                const thumbnails = portfolioGrid.querySelectorAll('.thumbnail');
                thumbnails.forEach(thumbnail => {
                    const anchor = thumbnail.querySelector('a');
                    anchor.addEventListener('click', function(e) {
                        e.preventDefault();
                        const thumbnailContent = thumbnail.innerHTML;
                        modalBody.innerHTML = thumbnailContent;
                        const thumbnailModal = new bootstrap.Modal(document.getElementById(
                            'thumbnailModal'));
                        thumbnailModal.show();
                    });
                });
            });
        </script>
    @endpush
@endonce
