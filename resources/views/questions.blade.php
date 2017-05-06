@extends('layouts.master')
@section('before-styles')
{{-- This will be loaded before all.css --}}
@endsection
@section('after-styles')
@endsection

@section('content')
  <a class="waves-effect waves-light red lighten-1 btn" id="demo" style="left:0;position:fixed"></a>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <div class="row">
        <br><br>
        <script>
        // Set the date we're counting down to
        var countDownDate = new Date("Jan 5, 2018 15:37:25").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("demo").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
        </script>
        <h1 class="header center">Quiz IPA</h1>
        <div class="row center">
          <h5 class="header col s12">Pilihlah jawaban yang tepat dari pertanyaan berikut ini</h5>
        </div>
        <br>
      </div><!--  /.row  -->
      <?php $i = 0; $j = 0;?>
      @foreach($questions as $question)
      <div class="collection with-header">
        <div class="collection-header"><h5>{{($i+1). ". ". $question->question}}</h5></div>
        <div class="collection-item">
          <form action="#">
           <?php
                $thisOptions = $options->where('id_question', $question->id);
            ?>
           @foreach($thisOptions as $thisOption)
           <p>
             <input name="group{{$i}}" type="radio" id="test{{$j}}" />
             <label for="test{{$j}}">{{$thisOption->statement}}</label>
           </p>
           <?php $j++; ?>
           @endforeach
         </form>
        </div>
      </div>
      <?php $i++; ?>
      @endforeach
      </div>
    </div><!--  /.container  -->
  </div><!-- /.section -->
  @endsection
@section('before-scripts')
@endsection

@section('after-scripts')
  <script>
  $(document).ready(function(){
      $('.collapsible').collapsible({
        accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
      });
    });
  </script>
@endsection
