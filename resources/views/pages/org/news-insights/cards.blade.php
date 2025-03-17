@extends('pages.org.activities')
@section('activityContent')
    <ul class="activities-container fusion-grid fusion-grid-2 fusion-flex-align-items-flex-start fusion-grid-posts-cards">
        @foreach ($activities as $activity)
            @include('pages.org.news-insights.partials-activitiy', ['activity' => $activity])
        @endforeach
    </ul>

    @if ($activities->hasMorePages())
        <div class="text-center mt-4">
            <button id="load-more" class="fusion-button"
                    data-next-page="{{ $activities->currentPage() + 1 }}"
                    data-last-page="{{ $activities->lastPage() }}">
                عرض المزيد
                <i class="fas fa-chevron-down"></i>
            </button>
        </div>
    @endif

    <script>
        document.getElementById('load-more')?.addEventListener('click', function() {
            const button = this;
            const nextPage = parseInt(button.dataset.nextPage);
            const lastPage = parseInt(button.dataset.lastPage);

            button.disabled = true;
            button.innerHTML = 'جاري التحميل...';

            fetch(`?page=${nextPage}`)
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newItems = doc.querySelector('.activities-container')?.innerHTML || '';

                    // Append new items
                    document.querySelector('.activities-container').insertAdjacentHTML('beforeend', newItems);

                    // Update pagination button
                    const newPage = nextPage + 1;
                    if (newPage > lastPage) {
                        button.remove();
                    } else {
                        button.dataset.nextPage = newPage;
                        button.disabled = false;
                        button.innerHTML = 'عرض المزيد <i class="fas fa-chevron-down"></i>';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    button.disabled = false;
                    button.innerHTML = 'عرض المزيد <i class="fas fa-chevron-down"></i>';
                });
        });
    </script>
@endsection
