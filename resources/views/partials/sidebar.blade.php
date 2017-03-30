<div class="col-sm-3 offset-sm-1 blog-sidebar">
  <div class="sidebar-module sidebar-module-inset">
    <h6>You may also like</h6>

      @foreach($users as $uList)
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <img src="/uploads/avatars/{{$uList->avatar}}" style="width: 50px; height: 50; float: left; border-radius: 50%; margin-right: 25px;">
                    <h5>{{$uList->name}}</h5>
                 <a href="#" style="margin-right: .5rem;" class="btn btn-info"> Add </a>
                </div>
            </div>
        </div>
        <hr>
      @endforeach
     <!--  <span>
        <img class="prof_pic" src="http://orig10.deviantart.net/41b9/f/2013/243/1/1/avatar___the_legend_of_aang___profile_picture_by_eqbal4-d6kjawv.png">
        <a  class="prof_name" href=""> Anthony </a>
      </span><hr>
      <span>
        <img class="prof_pic" src="http://orig10.deviantart.net/41b9/f/2013/243/1/1/avatar___the_legend_of_aang___profile_picture_by_eqbal4-d6kjawv.png">
        <a  class="prof_name" href=""> Venson </a>
      </span> -->

  </div>
 <!--  <div class="sidebar-module">
    <h4>Top Stories</h4>
    <ol class="list-unstyled">
      <li><a href="#">March 2014</a></li>
      <li><a href="#">February 2014</a></li>
      <li><a href="#">January 2014</a></li>
      <li><a href="#">December 2013</a></li>
      <li><a href="#">November 2013</a></li>
      <li><a href="#">October 2013</a></li>
      <li><a href="#">September 2013</a></li>
      <li><a href="#">August 2013</a></li>
      <li><a href="#">July 2013</a></li>
      <li><a href="#">June 2013</a></li>
      <li><a href="#">May 2013</a></li>
      <li><a href="#">April 2013</a></li>
    </ol>
  </div>
  <div class="sidebar-module">
    <h4>Elsewhere</h4>
    <ol class="list-unstyled">
      <li><a href="#">GitHub</a></li>
      <li><a href="#">Twitter</a></li>
      <li><a href="#">Facebook</a></li>
    </ol>
  </div> -->
</div><!-- /.blog-sidebar -->