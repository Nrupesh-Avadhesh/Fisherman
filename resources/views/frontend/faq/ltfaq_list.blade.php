@foreach($faq as $key=>$val)
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading{{ $key }}">
            @if($key == 0)
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">
            @else    
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="false" aria-controls="collapse{{ $key }}">
            @endif
                <span>Q.</span> {{ $val->question }}
            </button>
        </h2>
        <div id="collapse{{ $key }}" class="accordion-collapse collapse @if($key == 0) show @endif" aria-labelledby="heading{{ $key }}" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <p>{{ $val->answer }}</p>
            </div>
        </div>
    </div>
@endforeach