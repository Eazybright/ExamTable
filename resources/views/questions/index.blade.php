@extends('layouts.app')

@section('styles')
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">

                    <h1 class="mt-0 header-title text-center">All questions</h1>
                    <hr>
                    @if(isset($questions) && count($questions) > 0)
                        @foreach($questions as $que)
                            <div style='transform: scale(0.65); position: relative; top: -100px; margin-bottom: -150px;'>
                                <h3>{{$loop->iteration}}.) {{$que->question}}</h3>
                                <p>Category: <span class="badge badge-primary">{{$que->category->name}}</span>
                                <hr />

                                <div id='block-11' style='padding: 10px;'>
                                    <label for='option-11' style='padding: 5px; font-size: 2.5rem;'>
                                        <input type='radio' name='option' value='6/24' id='option-one' 
                                            style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;' />
                                        {{$que->option_one}}
                                    </label>
                                </div>
                            
                                <div id='block-12' style='padding: 10px;'>
                                    <label for='option-12' style='padding: 5px; font-size: 2.5rem;'>
                                        <input type='radio' name='option' value='6' id='option-two' 
                                            style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;' />
                                        {{$que->option_two}}
                                    </label>
                                </div>
                            
                                <div id='block-13' style='padding: 10px;'>
                                    <label for='option-13' style='padding: 5px; font-size: 2.5rem;'>
                                        <input type='radio' name='option' value='1/3' id='option-three' style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;' />
                                        {{$que->option_three}}
                                    </label>
                                </div>
                            
                                <div id='block-14' style='padding: 10px;'>
                                    <label for='option-14' style='padding: 5px; font-size: 2.5rem;'>
                                        <input type='radio' name='option' value='1/6' id='option-four' 
                                            style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;' />
                                        {{$que->option_four}}
                                    </label>
                                </div>
                                <div id='block-14' style='padding: 10px;'>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <button type="button" class="btn btn-outline-primary edit-question mt-1" 
                                                data-toggle="modal" data-target="#edit" data-myquestion="{{$que->question}}"
                                                data-optiontwo="{{$que->option_two}}" data-optionthree="{{$que->option_three}}"
                                                data-optionfour="{{$que->option_four}}" data-categoryid="{{$que->category_id}}" 
                                                data-categoryname="{{$que->category->name}}" data-optionone="{{$que->option_one}}"
                                                data-questionid="{{$que->id}}">
                                                Edit Question
                                            </button>
                                        </div>
                                        <div class="col-md-3">
                                            <form action="{{route('questions.destroy', $que->id)}}" method="POST" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">
                                                    Delete (this action is irreversible)
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h3 class="text-danger">There are no questions yet</h3>
                        <p>
                            <a href="{{route('questions.create')}}">Add questions here</a>
                        </p>
                    @endif         
                    
                    <div class="pagination">
                        {{$questions->links()}}
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade text-left" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Edit Extension</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="questionUpdateForm" method="POST" data-parsley-validate>
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Question</label>
                                <div>
                                    <textarea required class="form-control" rows="3" name="question" id="question"></textarea>
                                </div>
                            </div>
    
                            {{ Form::label('category_id', 'Category:', ['class'=> 'mt-10'])}}
                            <select class="form-control" name="category_id" id='category_id' required>
                                <option selected disabled>Choose Category</option>
                                <?php $categories = \App\Models\Category::get(); ?>
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
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">
                                Update
                            </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/parsley.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#edit').on('show.bs.modal', function (event) {
                var button, question, option_two, option_one, category_id, option_three, option_four, category_name, question_id;
                button = $(event.relatedTarget) 
                question = button.data('myquestion')
                option_two = button.data('optiontwo')
                option_one = button.data('optionone')
                option_three = button.data('optionthree')
                category_id = button.data('categoryid') 
                option_four  = button.data('optionfour')
                category_name  = button.data('categoryname')
                question_id  = button.data('questionid')

                var modal = $(this)                    
                
                modal.find('.modal-body #question').val(question)
                modal.find('.modal-body #category_id').val(category_id)
                modal.find('.modal-body #option_1').val(option_one)
                modal.find('.modal-body #option_2').val(option_two)
                modal.find('.modal-body #option_3').val(option_three)
                modal.find('.modal-body #option_4').val(option_four)
                $('.modal-body #category_id option[value="'+ category_name + '"]').attr("selected", "selected");

                let url = "{{ url('questions')}}"+'/'+`${question_id}`
                let action = $('#questionUpdateForm').attr('action', url);
            })
        });
    </script>
@endsection
