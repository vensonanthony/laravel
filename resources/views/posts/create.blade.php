@extends('/layouts/temp_main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
        <div class="col-8" style="margin: 0 auto;">
            <form method="post" action="/posts">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required="required">
                </div>
                <div class="form-group">
                    <label for="body">Content</label>  
                    <textarea name="body" id="body" class="form-control" required="required" style="min-height: 20rem;"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"> Publish </button>
                </div>
            </form>
        </div>
        </div>
    </div> <!-- row -->
</div> <!-- container -->
@endsection
