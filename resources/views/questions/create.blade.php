@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" href="{{asset('css/parsley.css')}}">
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8 ">
            <div class="card m-b-20"> 
                <div class="card-body">

                    <h4 class="mt-0 header-title text-center">Create Exam Question</h4>
                    <hr>
                    <p id="error-message"></p>

                    <form id="questionForm" data-parsley-validate>
                        @csrf
                        <div class="form-group">
                            <label>Question</label>
                            <div>
                                <textarea required class="form-control" rows="3" name="question" id="question"></textarea>
                            </div>
                        </div>

                        {{ Form::label('category_id', 'Category:', ['class'=> 'mt-10'])}}
                        <select class="form-control" name="category_id" id='category_id' required>
                            <option selected disabled>Choose Category</option>
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select><br>

                        <div class="form-group">
                            <label for="option_1">First Option</label>
                            <div> 
                                <input type="text" id="option_1" name="option_1"
                                        class="form-control" required placeholder="First Option"/>
                            </div>
                        </div>    
                        
                        <div class="form-group">
                            <label for="option_2">Second Option</label>
                            <div> 
                                <input type="text" id="option_2" name="option_2"
                                        class="form-control" required placeholder="Second Option"/>
                            </div>
                        </div>                        

                        <div class="form-group">
                            <label for="option_3">Third Option</label>
                            <div> 
                                <input type="text" id="option_3" name="option_3"
                                        class="form-control" required placeholder="Third Option"/>
                            </div>
                        </div>                        

                        <div class="form-group">
                            <label for="option_4">Fourth Option</label>
                            <div> 
                                <input type="text" id="option_4" name="option_4"
                                        class="form-control" required placeholder="Fourth Option"/>
                            </div>
                        </div>       

                        <div class="form-group">
                            <div>
                                <button class="btn btn-success waves-effect waves-light" onclick="submitQuestion()">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div><!-- end of row -->
@endsection

@section('scripts')
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/parsley.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#error-message').hide()
        });

        function submitQuestion(){
            $('#questionForm').submit(function(e){
                e.preventDefault();
                var question, category_id, option_one, option_two, option_three, option_four;

                question = $('#question').val();
                category_id = $('#category_id').val();
                option_one = $('#option_1').val();
                option_two = $('#option_2').val();
                option_three = $('#option_3').val();
                option_four = $('#option_4').val();
                // console.log(question, category_id, option_one, option_two, option_three, option_four);

                $.ajax({
                    method: "POST",
                    url: "{{route('questions.store')}}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'question': question,
                        'category_id': category_id,
                        'option_one': option_one,
                        'option_two': option_two,
                        'option_three': option_three,
                        'option_four': option_four
                    },
                    success: function(response){ // What to do if we succeed
                        if(response.status == true){
                            $('#error-message').show()
                            $('#error-message').html('<span class="alert alert-success">'+`${response.message}`+'</span><br>')
                            $('#questionForm')[0].reset();
                        }
                        // console.log(response);
                    },
                    error: (jqXHR, textStatus) => {
                        var dError;
                        if(jqXHR.status == 422){
                            dError = jqXHR.responseJSON.data.error;
                            $('#error-message').show()
                            $('#error-message').html('<span class="alert alert-danger">'+`${dError}`+'</span><br>') 
                            // console.log(dError)
                        }                  
                        dError = jqXHR.responseJSON.data.error;
                        $('#error-message').show()
                        $('#error-message').html('<span class="alert alert-danger">'+`${dError}`+'</span><br>') 
                        // console.log(dError)      
                    }
                });
            });
        }        
    </script>

@endsection