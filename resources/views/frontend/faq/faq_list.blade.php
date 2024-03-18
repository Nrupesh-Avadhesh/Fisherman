@foreach($faq as $key=>$val)
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading{{ $page }}{{ $key }}">
            @if($key == 0 && $page ==1)
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $page }}{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $page }}{{ $key }}">
            @else    
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $page }}{{ $key }}" aria-expanded="false" aria-controls="collapse{{ $page }}{{ $key }}">
            @endif
                <span>Q.</span> {{ $val->question }}
            </button>
        </h2>
        <div id="collapse{{ $page }}{{ $key }}" class="accordion-collapse collapse @if($key == 0 && $page ==1) show @endif" aria-labelledby="heading{{ $page }}{{ $key }}" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <p>{{ $val->answer }}</p>
            </div>
        </div>
    </div>
@endforeach