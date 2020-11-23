@extends('layouts.website')
@section('title', 'Carrer Apply | '.$seo->meta_title)
@section('content')
<section id="career_box">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="apply_box">
                       <h3>Laravel Developer (Intern)</h3>
                       <span class="fl">Full time</span>
                        <span class="ad"><i class="fas fa-map-marker-alt"></i> Uttara,Dhaka</span>
                         <span class="ex"><i class="fas fa-bookmark"></i> No Experience Required</span>
                          <span class="dt"><i class="fas fa-calendar-alt"></i> 30-10-2020</span>
                    </div>
                </div>
            </div>

        </div>
        <style>
                    #career_box{
                        padding: 80px 0px;
                        background-color: #000;
                    }
                    .apply_box h3 {
                        color: #fff;
                        font-weight: 600;
                        text-transform: capitalize;
                        font-size: 26px;
                        margin-bottom: 25px;
                    }
                    span.fl {
                        background-color: #fff;
                        padding: 4px 9px;
                        border-radius: 5px;
                        margin-right: 10px;
                    }
                    span.ad {
                        color: #fff;
                        margin-right: 10px;
                    }
                    span.ex {
                        color: #fff;
                        margin-right: 10px;
                    }
                    span.dt {
                        color: #fff;
                    }
                    .ap h3{
                        font-size: 24px;
                        font-weight: 600;
                        margin-bottom: 30px;
                    }
                    .input-group-text button {
                        width: 40px;
                        height: 40px;
                        line-height: 40px;
                        border-style: none;
                        border-radius: 2px;
                    }
                    button.btn_submit {
                        /* display: block; */
                        background-color: #007bff;
                        border-style: none;
                        color: #fff;
                        padding: 10px 20px;
                        border-radius: 5px;
                        width: 100%;
                    }

                </style>
    </section>
    <div id="career_post">
        <div class="container">
				<div class="row">
				<div class="col-sm-12">
					<div class="ap">
						<h3>Apply Now</h3>
					</div>
				</div>
				</div>
            <div class="row">

                <div class="col-sm-12">

                    <div class="job_list wow animate__animated animate__fadeIn animate__delay-0.7s">
                       <form action="{{url('/carrer/apply/submit')}}" method="post" enctype="multipart/form-data">
                       	@csrf

						  <div class="form-row">
						    <div class="form-group col-md-6">
						      <label for="inputEmail4">Full Name<span style="color: red">*</span></label>
						      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="name">
						      <input type="hidden" name="jobid" value="{{$apply->id}}">
						      @error('name')
								    <div class="alert alert-danger">{{ $message }}</div>
								@enderror
						    </div>
						    <div class="form-group col-md-6">
						      <label for="inputPassword4">Mobile<span style="color: red">*</span></label>
						      <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="mobile">
						      @error('mobile')
								    <div class="alert alert-danger">{{ $message }}</div>
								@enderror
						    </div>
						  </div>
						  <div class="form-row">
						  	<div class="form-group col-md-6">
						    <label for="inputAddress">Email<span style="color: red">*</span></label>
						    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="inputAddress" placeholder="Email">
						    	@error('email')
								    <div class="alert alert-danger">{{ $message }}</div>
								@enderror
						     </div>
						         <div class="form-group col-md-6">
						      <label for="inputCity">Your Portfolio link</label>
						      <input type="text" name="protfolio" class="form-control" id="inputCity" placeholder="Portfolio link">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputAddress2">Cover Letter</label>
						    <textarea class="form-control" name="coverlatter"></textarea>
						  </div>
						  <div class="form-row">
						    <div class="form-group col-md-4">
						      <label for="inputState">Your CV (.pdf only)*</label>
						      <input type="file" name="resume" id="" class="@error('resume') is-invalid @enderror">
						      @error('resume')
								    <div class="alert alert-danger">{{ $message }}</div>
								@enderror
						    </div>
						  </div>
						  <div class="row">
				<div class="col-sm-12">
					<div class="ap">
						<h3>Questions</h3>
					</div>
				</div>
				</div>
							 <div class="form-row">
							  	<div class="form-group col-md-6">
							    <label for="inputAddress">When you can join our team?<span style="color: red">*</span></label>
							    <input type="text" name="joindate" class="form-control @error('joindate') is-invalid @enderror" id="inputAddress" placeholder="eg:From 1st January">
							    @error('joindate')
								    <div class="alert alert-danger">{{ $message }}</div>
								@enderror
							     </div>
							         <div class="form-group col-md-6">
							      <label for="inputCity">What is your location? <span style="color: red">*</span></label>
							      <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" id="inputCity" placeholder="eg: Mirpur-6">
							      @error('location')
								    <div class="alert alert-danger">{{ $message }}</div>
								@enderror
							    </div>
							  </div>
							   <div class="form-row">
								  	<div class="form-group col-md-6">
									    <label for="inputAddress">How Long you are working with Web Design or Developing? <span style="color: red">*</span></label>
									    <input type="text" name="experience" class="form-control @error('experience') is-invalid @enderror" id="inputAddress" placeholder="eg: 1-2 year">
									    @error('experience')
										    <div class="alert alert-danger">{{ $message }}</div>
										@enderror
								     </div>
							         <div class="form-group col-md-6">
									      <label for="inputCity">What is your salary expectation ? <span style="color: red">*</span></label>
									      <input type="text" name="ex_selary" class="form-control @error('ex_selary') is-invalid @enderror" id="inputCity" placeholder="eg: 8000">
									      @error('ex_selary')
										    <div class="alert alert-danger">{{ $message }}</div>
										@enderror
							   		 </div>
							  </div>

							     <div class="row">
                                     <div class="col-sm-12 text-center">
                                        <div class="form-group">
                                            <button type="submit" class="btn_submit">Submit Application</button>
                                            </div>
                                     </div>
							     </div>







						</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--- career part end -->
@endsection
