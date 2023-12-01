@include('includes.header')
<div class="container">
    <h1>Books</h1>
    <nav aria-label="my">
        <ul class="pagination pagination-sm book_pagination">
          @for($i=1;$i<=$totalPages;$i++)
            <li class="page-item {{$i===1 ? 'active' : ''}}">
                <span class="page-link">{{$i}}</span>
            </li>
          @endfor
        </ul>
    </nav>
    <div class="book-list">
        @foreach($books as $book)
        <div class="card mt-3">
            <div class="card-header"><b>{{$book->name}}</b></div>
            <div class="card-body">
                <ul>
                    <li>Author: {{implode(", ", $book->authors()->pluck("name")->toArray())}}</li>
                    <li>Publishing House: {{implode(", ", $book->publishers()->pluck("name")->toArray())}}</li>
                </ul>
            </div>
        </div>
        @endforeach
    </div>

    
</div>
@include('includes.footer')