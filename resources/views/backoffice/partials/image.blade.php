@push('style')
    <style>
        .preview {
            width: 100%;
        }

        .box-image {
            float: left;
            width: 160px;
            height: auto;
            margin-top: 15px;
            margin-right: 15px;
        }
    </style>
@endpush

<div class="col-md-9">
    <div class="form-group">
        <label class="col-sm-2 control-label">
            Image
        </label>
        <div class="col-sm-10">
            <button type="button" class="add-file btn btn-warning btn-sm">Image</button>
            <div id="group"></div>
            <div id="images">
                @foreach ($images as $index => $image)
                    @if ($image->collection_name == $collection)
                        <div class='box-image' data-key='{{ $index }}' data-id="{{ $image->id }}">
                            <img class='preview' src="{{ asset("$image->disk/$image->id/$image->file_name") }}">
                            <i class='fa fa-times-circle remove-file'></i>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function readURL(input) {
            for (var i = 0; i < input.files.length; i++) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var last = $(".box-image").last();

                    if (last.length == 0) {
                        var key = 0;
                    }
                    else {
                        var key = parseInt(last.attr('data-key')) + 1;
                    }

                    var html = "";
                    html += "<div class='box-image' data-key='" + key + "'>";
                    html += "<img class='preview' src='" + e.target.result + "'>";
                    html += "<i class='fa fa-times-circle remove-file'></i>";
                    html += "</div>";

                    $("#images").append(html);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

        $(document).on("click", ".add-file", function() {
            if ($("#imgInp").length == 0) {
                var last = $("input[type='file']").last();

                if (last.length == 0) {
                    var key = 0;
                }
                else {
                    var key = parseInt(last.attr('data-key')) + 1;
                }

                var htmls = "<input type='file' id='imgInp' name='image[]' data-key='" + key + "' class='hidden'>";
                $("#group").append(htmls);
            }

            $("#imgInp").trigger("click");
        });

        $(document).on("change", "#imgInp", function() {
            readURL(this);
            $("#imgInp").removeAttr("id");
        });

        $(document).on("click", ".remove-file", function() {
            var key = $(this).parent().attr("data-key");

            $("[data-key='" + key + "']").remove();

            if ($(this).parent().attr("data-id")) {
                $('form').append("<input type='hidden' name='remove_images[]' value='" + $(this).parent().attr("data-id") + "'>");
            }
        });
    </script>
@endpush