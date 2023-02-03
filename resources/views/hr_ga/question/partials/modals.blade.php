<div class="modal fade" id="addQuest" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content" style="border-radius:10px">
            <form action="{{ route('job_orientation.soal-store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row" style="padding:18px 24px">
                    <div class="col-12 justify-sb">
                        <div class="title-20">Add Queastion</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="borderlight"></div>
                    </div>
                    <input type="hidden" id="modul_id" name="modul_id" value="{{$data->id}}">
                    <div class="col-12 mb-4">
                        <span class="title-sm">Question</span>
                        <div class="input-group mt-1">
                            <textarea type="text" class="form-control border-input-10" id="question" name="question" placeholder="input question..." required></textarea>
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
                                <input type="text" id="option1" name="option1" class="form-control border-input-10" placeholder="Select option"/>
                            </div>
                            <div class="radioContainer">
                                <input type="radio" name="answer" value="A" id="radio1" class="radioCustomInput">
                                <label for="radio1" class="radioCustom"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-1 mb-2">
                        <div class="flex" style="gap:.5rem">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="custom-calendar sizeAppend">B</span>
                                </div>
                                <input type="text" id="option2" name="option2" class="form-control border-input-10" placeholder="Select option"/>
                            </div>
                            <div class="radioContainer">
                                <input type="radio" name="answer" value="B" id="radio2" class="radioCustomInput">
                                <label for="radio2" class="radioCustom"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-1 mb-2">
                        <div class="flex" style="gap:.5rem">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="custom-calendar sizeAppend">C</span>
                                </div>
                                <input type="text" id="option3" name="option3" class="form-control border-input-10" placeholder="Select option"/>
                            </div>
                            <div class="radioContainer">
                                <input type="radio" name="answer" value="C" id="radio3" class="radioCustomInput">
                                <label for="radio3" class="radioCustom"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-1 mb-2">
                        <div class="flex" style="gap:.5rem">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="custom-calendar sizeAppend">D</span>
                                </div>
                                <input type="text" id="option4" name="option4" class="form-control border-input-10" placeholder="Select option"/>
                            </div>
                            <div class="radioContainer">
                                <input type="radio" name="answer" value="D" id="radio4" class="radioCustomInput">
                                <label for="radio4" class="radioCustom"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 justify-start mt-3">
                        <button type="submit" class="btn-blue saveQuest">Add Question<i class="ml-2 fas fa-download"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ================== -->