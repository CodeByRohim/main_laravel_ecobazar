@extends('layouts.BackendLayout')
@section('CustomerMessage')
@section('title','Customer Message')
                        <div class="feedback p-3 d-flex justify-content-between">
                            <div class="col-12 col-lg-7">     
                            
                                <!-- Review Card -->
                                @foreach($messages as $message)
                                <div class="review-card mb-2">
                                  <div class="review-header d-flex justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                      <img class="img_fluid rounded" width="35px" src="https://api.dicebear.com/9.x/initials/svg?seed={{$message->name}}" alt="Profile Picture">
                                      <div class="review-details ">
                                        <h5 class="mb-0">{{$message->name}}</h5>
                                        <div class="review-stars">
                                          &#9733;&#9733;&#9733;&#9733;&#9734; <!-- 4/5 stars -->
                                        </div>
                                      </div>
                                    </div>
                                    <div class="review-date mr-0">
                                       {{ $message->created_at->diffForHumans() }}    
                                    </div>
                                  </div>
                                  <div class="review-text">
                                    <p class="mb-1">
                                       {{$message->message}}
                                    </p>
                                    <div class="d-flex gap-1">
                                        <a href="" class="text-black" style="hover:text: black;">Reply</a>
                                        <a href="" class="text-black" style="hover:text: black;">Delete</a>
                                    </div>
                                  </div>
                                </div>
                                <hr>
                                @endforeach
                                 
                        {{$messages->links()}}
                        <div class="col-lg-5"></div>
                    </div>
                  </div>
             

@endsection