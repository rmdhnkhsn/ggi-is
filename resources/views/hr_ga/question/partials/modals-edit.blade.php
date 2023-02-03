<div class="modal fade" id="updateQuest-{{$value->id}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content" style="border-radius:10px">
            <form action="{{ route('job_orientation.soal-update')}}" method="post" enctype="multipart/form-data">
                @csrf 
                <input type="hidden" name="id" value="{{$value->id}}">
                <div class="row" style="padding:18px 24px">
                    <div class="col-12 justify-sb">
                        <div class="title-20">Update Question</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="borderlight"></div>
                    </div>
                  
                    <div class="col-12 mb-4">
                        <span class="title-sm">Question</span>
                        <div class="input-group mt-1">
                            <textarea type="text" class="form-control border-input-10" id="question" name="question" placeholder="input question..." required>{{$value->question}}</textarea>
                        </div>
                    </div>
                    <div class="col-12 justify-sb">
                        <div class="title-sm">Multiple Choice</div>
                        <div class="title-sm">True</div>
                    </div>
                    <div class="col-12 mt-1 mb-2">
                        <div class="flex" style="gap:.5rem">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="custom-calendar sizeAppend">A</span>
                                </div>
                                <input type="text" name="option1" id="option1" value="{{$value->option1}}" class="form-control border-input-10" placeholder="Select option"/>
                            </div>
                            <div class="radioContainer">
                                <input type="radio" name="answer{{$value->id}}" id="radio-A{{$value->id}}" value="A" {{ ($value->answer == 'A' ) ? "checked" : "" }} class="radioCustomInput"> 
                                <label for="radio-A{{$value->id}}" class="radioCustom"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-1 mb-2">
                        <div class="flex" style="gap:.5rem">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="custom-calendar sizeAppend">B</span>
                                </div>
                                <input type="text" name="option2" id="option2" value="{{$value->option2}}" class="form-control border-input-10" placeholder="Select option"/>
                            </div>
                            <div class="radioContainer">
                                <input type="radio" name="answer{{$value->id}}" id="radio-B{{$value->id}}" value="B" {{ ($value->answer == 'B' ) ? "checked" : "" }} class="radioCustomInput">
                                <label for="radio-B{{$value->id}}" class="radioCustom"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-1 mb-2">
                        <div class="flex" style="gap:.5rem">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="custom-calendar sizeAppend">C</span>
                                </div>
                                <input type="text" name="option3" id="option3" value="{{$value->option3}}" class="form-control border-input-10" placeholder="Select option"/>
                            </div>
                            <div class="radioContainer">
                                <input type="radio" name="answer{{$value->id}}" id="radio-C{{$value->id}}" value="C" {{ ($value->answer == 'C' ) ? "checked" : "" }} class="radioCustomInput">
                                <label for="radio-C{{$value->id}}" class="radioCustom"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-1 mb-2">
                        <div class="flex" style="gap:.5rem">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="custom-calendar sizeAppend">D</span>
                                </div>
                                <input type="text" name="option4" id="option4" value="{{$value->option4}}" class="form-control border-input-10" placeholder="Select option"/>
                            </div>
                            <div class="radioContainer">
                                <input type="radio" name="answer{{$value->id}}" id="radio-D{{$value->id}}" value="D"  {{ ($value->answer == 'D' ) ? "checked" : "" }} class="radioCustomInput">
                                <label for="radio-D{{$value->id}}" class="radioCustom"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 justify-start mt-3">
                        <button type="submit" class="btn-blue updateQuest">Update Question<i class="ml-2 fas fa-download"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ================== -->