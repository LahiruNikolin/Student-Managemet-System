<?php
 
if (Session::has('status'))
{
    
     $status=Session::get('status');
     Session::forget('status');

     
}

?>

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

    @case(4)
    <div class="alert alert-success scanFD" role="alert">
        <span> Payment recorded successfully!</span>
        <span><i class="fas fa-check"></i></span>
      </div>
      @break
    @case(5)
    <div class="alert alert-success scanFD" role="alert">
          <span> Email has been sent successfully!</span>
          <span><i class="fas fa-check"></i></span>
      </div>
      @break
      @case(6)
      <div class="alert alert-success scanFD" role="alert">
          <span> User has been created successfully!</span>
          <span><i class="fas fa-check"></i></span>
        </div>
        @break
        @case(7)
        <div class="alert alert-danger scanFD" role="alert">
            <span> Please download the QR before emailing!</span>
            <span><i class="fas fa-exclamation"></i></span>
          </div>
          @break
          @case(8)
        <div class="alert alert-warning scanFD" role="alert">
            <span> Student has no classes today!</span> 
            <span><i class="fas fa-exclamation-triangle"></i></span>
        </div>
        @break
    @default

@endswitch