<!--Temporary -->
{{--{!! Form::hidden('user_id', 1) !!}--}}


<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('title', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('published_at', 'Publish On:') !!}
{{--    {!! Form::input('date', 'published_at', $article->published_at->format('Y-m-d'), ['class' => 'form-control']) !!}--}}
    {!! Form::input('date', 'published_at', $article->published_at, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('tag_list', 'Tags:') !!}
{{--    {!! Form::select('tags', $tags,  null , ['class' => 'form-control', 'multiple']) !!}--}}
{{--    {!! Form::select('tags[]', $tags,  null , ['class' => 'form-control', 'multiple']) !!}--}}
{{--    {!! Form::select('tag_list[]', $tags, $article->tagList, ['class' => 'form-control', 'multiple']) !!}--}}
    {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@section('footer')
    <script>
        $('#tag_list').select2({
            placeholder: 'Chose a tag',
            // tags: true,      // user can add a tag
/*
            // appending tag items (hardcode)
            data: [
                { id: 'one', text: 'One'},
                { id: 'two', text: 'Two'},
            ],
*/
/*            ajax: {
                dataType: 'json', // return Tags::all(); -> to json
                url: 'api/tags',
                delay: 250, //  delay in ms
                data: function (params) {
                    return {
                        tags: params.term
                    }
                },
                processResults: function(data) {
                    return { results: data }
                }
            }*/
/*            ajax: {
                dataType: 'json',
                url: 'tags.json',   // tags.json file should exist and be placed in /public, so it will be like example.com/tags.json
                processResults: function(data) {
                    return { results: data }
                }
            }*/
        });
    </script>
@endsection