

  @switch($status)
    @case(1)
    <div class="alert alert-warning scanFD" role="alert">
        <span>Attendence has already been marked for today!</span> 
        <span><i class="fas fa-exclamation-triangle"></i></span>
    </div>
        @break

    @case(2)
    <div class="alert alert-success scanFD" role="alert">
        <span> Attendence Recorded!</span>
        <span><i class="fas fa-check"></i></span>
      </div>
        @break

    @case(3)
    <div class="alert alert-danger scanFD" role="alert">
        <span> Payments overdue</span>
        <span><i class="fas fa-exclamation"></i></span>
      </div>
    @default

@endswitch