@extends('front.layout.app')
@section('main_content')
@section('seo_title'){{$page_home_data->title}}@endsection
@section('meta_description'){{$page_home_data->meta_description}}@endsection
<div class="slider" style="background-image: url('{{ asset('uploads/' . $page_home_data->background) }}');">
   <div class="bg"></div>
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="item">
               <div class="text">
                  <h2>{{$page_home_data->heading}}</h2>
                  <p>
                     {!!$page_home_data->text!!}
                  </p>
               </div>
               <div class="search-section">
                  <form action="jobs.html" method="post">
                     <div class="inner">
                        <div class="row">
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <input type="text" name="" class="form-control" placeholder="{{$page_home_data->job_title}}" />
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <select name="" class="form-select select2">
                                    <option value="">{{$page_home_data->job_location}}</option>
                                    @foreach ($joblocations as $joblocation)
                                    <option value="{{$joblocation->id}}">{{$joblocation->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <select name="" class="form-select select2">
                                    <option value="">{{$page_home_data->job_category}}</option>
                                    @foreach($jobCategorys as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <button type="submit" class="btn btn-primary">
                                 <i class="fas fa-search"></i>
                                 {{$page_home_data->search}}
                              </button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@if ($page_home_data->job_category_status == 'show')
<div class="job-category">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="heading">
                <h2>{{$page_home_data->job_category_heading}}</h2>
                <p>
                 {{$page_home_data->job_category_subheading}}
                </p>
             </div>
          </div>
       </div>
       <div class="row">
          @foreach ($jobCategorys as $jobCategory)
          <div class="col-md-4">
             <div class="item">
                <div class="icon">
                   <i class="{{ $jobCategory->icon }}"></i>
                </div>
                <h3>{{ $jobCategory->name }}</h3>
                <p>(5 Open Positions)</p>
                <a href=""></a>
             </div>
          </div>
          @endforeach
       </div>
       <div class="row">
          <div class="col-md-12">
             <div class="all">
                <a href="{{route('job_categories')}}" class="btn btn-primary">See All Categories</a>
             </div>
          </div>
       </div>
    </div>
 </div>
@endif
@if ($page_home_data->why_choose_status == 'show')
<div class="why-choose" style="background-image: url(uploads/{{$page_home_data->why_choose_background}});">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="heading">
                <h2>{{$page_home_data->why_choose_heading}}</h2>
                <p>
                    {!!$page_home_data->why_choose_subheading!!}
                </p>
             </div>
          </div>
       </div>
       <div class="row">
         @foreach ($whychooseitems as $item)
         <div class="col-md-4">
             <div class="inner">
                <div class="icon">
                   <i class="{{ $item->icon }}"></i>
                </div>
                <div class="text">
                   <h2>{{ $item->heading }}</h2>
                   <p>
                     {!! $item->text !!}
                   </p>
                </div>
             </div>
          </div>
         @endforeach
       </div>
    </div>
 </div>
@endif
@if ($page_home_data->featured_jobs_status == 'show')
<div class="job">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="heading">
                <h2>{{$page_home_data->featured_jobs_heading}}</h2>
                <p>{!!$page_home_data->featured_jobs_subheading!!}</p>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-lg-6 col-md-12">
             <div class="item d-flex justify-content-start">
                <div class="logo">
                   <img src="uploads/logo1.png" alt="" />
                </div>
                <div class="text">
                   <h3>
                      <a href="job.html">Software Engineer, Google</a>
                   </h3>
                   <div class="detail-1 d-flex justify-content-start">
                      <div class="category">Web Development</div>
                      <div class="location">United States</div>
                   </div>
                   <div class="detail-2 d-flex justify-content-start">
                      <div class="date">3 days ago</div>
                      <div class="budget">$300-$600</div>
                      <div class="expired">Expired</div>
                   </div>
                   <div class="special d-flex justify-content-start">
                      <div class="featured">Featured</div>
                      <div class="type">Full Time</div>
                      <div class="urgent">Urgent</div>
                   </div>
                   <div class="bookmark">
                      <a href=""><i class="fas fa-bookmark active"></i></a>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-lg-6 col-md-12">
             <div class="item d-flex justify-content-start">
                <div class="logo">
                   <img src="uploads/logo2.png" alt="" />
                </div>
                <div class="text">
                   <h3>
                      <a href="job.html">Web Designer, Amplify</a>
                   </h3>
                   <div class="detail-1 d-flex justify-content-start">
                      <div class="category">Web Development</div>
                      <div class="location">United States</div>
                   </div>
                   <div class="detail-2 d-flex justify-content-start">
                      <div class="date">1 day ago</div>
                      <div class="budget">$1000</div>
                   </div>
                   <div class="special d-flex justify-content-start">
                      <div class="featured">Featured</div>
                      <div class="type">Part Time</div>
                   </div>
                   <div class="bookmark">
                      <a href=""><i class="fas fa-bookmark"></i></a>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-lg-6 col-md-12">
             <div class="item d-flex justify-content-start">
                <div class="logo">
                   <img src="uploads/logo3.png" alt="" />
                </div>
                <div class="text">
                   <h3>
                      <a href="job.html">Laravel Developer, Gimpo</a>
                   </h3>
                   <div class="detail-1 d-flex justify-content-start">
                      <div class="category">Web Development</div>
                      <div class="location">Canada</div>
                   </div>
                   <div class="detail-2 d-flex justify-content-start">
                      <div class="date">2 days ago</div>
                      <div class="budget">$1000-$3000</div>
                   </div>
                   <div class="special d-flex justify-content-start">
                      <div class="featured">Featured</div>
                      <div class="type">Full Time</div>
                      <div class="urgent">Urgent</div>
                   </div>
                   <div class="bookmark">
                      <a href=""><i class="fas fa-bookmark"></i></a>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-lg-6 col-md-12">
             <div class="item d-flex justify-content-start">
                <div class="logo">
                   <img src="uploads/logo4.png" alt="" />
                </div>
                <div class="text">
                   <h3>
                      <a href="job.html">PHP Developer, Kite Solution</a>
                   </h3>
                   <div class="detail-1 d-flex justify-content-start">
                      <div class="category">Web Development</div>
                      <div class="location">Australia</div>
                   </div>
                   <div class="detail-2 d-flex justify-content-start">
                      <div class="date">7 hours ago</div>
                      <div class="budget">$1800</div>
                   </div>
                   <div class="special d-flex justify-content-start">
                      <div class="featured">Featured</div>
                      <div class="type">Full Time</div>
                      <div class="urgent">Urgent</div>
                   </div>
                   <div class="bookmark">
                      <a href=""><i class="fas fa-bookmark"></i></a>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-lg-6 col-md-12">
             <div class="item d-flex justify-content-start">
                <div class="logo">
                   <img src="uploads/logo5.png" alt="" />
                </div>
                <div class="text">
                   <h3>
                      <a href="job.html">Junior Accountant, ABC Media</a>
                   </h3>
                   <div class="detail-1 d-flex justify-content-start">
                      <div class="category">Marketing</div>
                      <div class="location">Canada</div>
                   </div>
                   <div class="detail-2 d-flex justify-content-start">
                      <div class="date">2 hours ago</div>
                      <div class="budget">$400</div>
                   </div>
                   <div class="special d-flex justify-content-start">
                      <div class="featured">Featured</div>
                      <div class="type">Part Time</div>
                      <div class="urgent">Urgent</div>
                   </div>
                   <div class="bookmark">
                      <a href=""><i class="fas fa-bookmark"></i></a>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-lg-6 col-md-12">
             <div class="item d-flex justify-content-start">
                <div class="logo">
                   <img src="uploads/logo6.png" alt="" />
                </div>
                <div class="text">
                   <h3>
                      <a href="job.html">Sales Manager, Tingshu Limited</a>
                   </h3>
                   <div class="detail-1 d-flex justify-content-start">
                      <div class="category">Marketing</div>
                      <div class="location">Canada</div>
                   </div>
                   <div class="detail-2 d-flex justify-content-start">
                      <div class="date">9 hours ago</div>
                      <div class="budget">$600-$800</div>
                   </div>
                   <div class="special d-flex justify-content-start">
                      <div class="featured">Featured</div>
                      <div class="type">Full Time</div>
                      <div class="urgent">Urgent</div>
                   </div>
                   <div class="bookmark">
                      <a href=""><i class="fas fa-bookmark"></i></a>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-md-12">
             <div class="all">
                <a href="jobs.html" class="btn btn-primary">See All Jobs</a>
             </div>
          </div>
       </div>
    </div>
 </div>
@endif

@if ($page_home_data->testmonial_status == 'show')
<div class="testimonial" style="background-image: url({{asset('uploads/'.$page_home_data->testmonial_background)}});">
    <div class="bg"></div>
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <h2 class="main-header">{{$page_home_data->testmonial_heading}}</h2>
          </div>
       </div>
       <div class="row">
          <div class="col-12">
             <div class="testimonial-carousel owl-carousel">
                 @foreach ($testmonials as $item)
                 <div class="item">
                     <div class="photo">
                        <img src="{{asset('uploads/'.$item->photo)}}" alt="" />
                     </div>
                     <div class="text">
                        <h4>{{$item->name}}</h4>
                        <p>{{$item->designation}}</p>
                     </div>
                     <div class="description">
                        <p>
                           {!!$item->comment!!}
                        </p>
                     </div>
                  </div>
                 @endforeach
             </div>
          </div>
       </div>
    </div>
 </div>
@endif
@if ($page_home_data->post_status == 'show')
<div class="blog">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="heading">
                <h2>{{$page_home_data->post_heading}}</h2>
                <p>
                   {!!$page_home_data->post_sub_heading!!}
                </p>
             </div>
          </div>
       </div>
       <div class="row">
         @foreach ($posts as $item)
         <div class="col-lg-4 col-md-6">
             <div class="item">
                <div class="photo">
                   <img src="{{ asset('uploads/'.$item->photo) }}" alt="" />
                </div>
                <div class="text">
                   <h2>
                      <a href="{{route('post',$item->slug)}}">{{ $item->title }}</a>
                   </h2>
                   <div class="short-des">
                      <p>
                         {!! $item->short_discription !!}
                      </p>
                   </div>
                   <div class="button">
                      <a href="{{route('post',$item->slug)}}" class="btn btn-primary">Read More</a>
                   </div>
                </div>
             </div>
          </div>
         @endforeach
       </div>
    </div>
 </div>
@endif
@endsection
