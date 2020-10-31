@extends('admin.master')
@section('contents')
<section class="page_content">
    <!-- panel -->
    <div class="panel mb-0">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title">
                        <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>view Resume</span>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                  <div class="panel_title">
                        <a href="{{route('admin.apply.index')}}" class="btn btn-success"><i class="fas fa-plus"></i></span>
                            <span>Back</span></a>
                    </div>
                </div>
            </div>

        </div>
        <!-- {{$data->resume}} -->
        <div class="panel_body">
            <iframe src="{{url('storage/app/'.$data->resume)}}" width="100%" height="700px;"></iframe>
        </div>
        </form>
    </div>
</section>

@endsection('contents')