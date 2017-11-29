@push('style')
    <style>
        .preview-cover {
            width: 100%;
        }

        .box-image-cover {
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
            รูปปก
        </label>
        <div class="col-sm-10">
            @php
                $display = 'inline-block';
                $url = '';
            @endphp

            @foreach ($images as $index => $image)
                @if ($image->collection_name == $collection)
                    @php
                        $display = 'none';
                        $url = $image->getUrl();
                    @endphp
                @endif
            @endforeach

            <button type="button" class="add-file-cover btn btn-warning btn-sm" style="display: {{ $display }}">เลือกรูปภาพ</button>
            <div id="cover"></div>
            <div id="image-cover">
            @if ($display == 'none')
                <div class='box-image-cover'>
                    <img class='preview-cover' src="{{ $url }}">
                    <i class='fa fa-times-circle remove-file-cover'></i>
                </div>
            @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function readURLCover(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var html = "";
                    html += "<div class='box-image-cover'>";
                    html += "<img class='preview-cover' src='" + e.target.result + "'>";
                    html += "<i class='fa fa-times-circle remove-file-cover'></i>";
                    html += "</div>";

                    $("#image-cover").append(html);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).on("click", ".add-file-cover", function () {
            var htmls = "<input type='file' id='imgCover' name='cover' class='hidden'>";
            $("#cover").append(htmls);

            $("#imgCover").trigger("click");
        });

        $(document).on("change", "#imgCover", function () {
            readURLCover(this);
            $(".add-file-cover").hide()
        });

        $(document).on("click", ".remove-file-cover", function () {
            $(".box-image-cover").remove();
            $("#imgCover").remove();
            $(".add-file-cover").show();
        });
    </script>
@endpush