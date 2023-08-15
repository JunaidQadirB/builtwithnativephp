<div class="mb-4">
    <label for="codeEditor{{isset($id)?$id:$name}}">{{$label}}</label>
    <div id="codeEditor{{isset($id)?$id:$name}}" class="w-full border" style="height:80vh;"></div>
    <textarea class="hidden" name="{{$name}}" id="{{isset($id)?$id:$name}}" cols="30" rows="10"></textarea>
    @if($errors->has($name))
        <small id="{{$name}}HelpId" class="block mt-1 text-red-500">{{$errors->first($name)}}</small>
    @else
        <small id="{{$name}}HelpId" class="block mt-1 text-gray-500">{{@$helpText}}</small>
    @endif
</div>

@push('styles')
    <link rel="stylesheet" href="{{url('/vendor/monaco-editor/vs/editor/editor.main.css')}}"
          data-name="vs/editor/editor.main"/>
@endpush

@push('scripts')
    <script>var require = {paths: {'vs': '/vendor/monaco-editor/vs'}};</script>
    <script src="{{asset('/vendor/monaco-editor/vs/loader.js')}}"></script>
    <script src="{{asset('/vendor/monaco-editor/vs/editor/editor.main.nls.js')}}"></script>
    <script src="{{asset('/vendor/monaco-editor/vs/editor/editor.main.js')}}"></script>
    <script>
        var editor

        document.addEventListener('DOMContentLoaded', function () {
            editor = monaco.editor.create(document.getElementById('codeEditor{{isset($id)?$id:$name}}'), {
                language: '{{@$language}}',
                readOnly:{{@$readonly ?? 'false'}}
            })
            var content =@json($value, JSON_PRETTY_PRINT);
            editor.setValue(content.join('\n'));
        })

        function {{isset($id)?$id:$name}}Save(e) {
            $('#{{isset($id)?$id:$name}}').html(editor.getValue())
            $('#{{isset($id)?$id:$name}}Form').submit()
        }
    </script>
@endpush
