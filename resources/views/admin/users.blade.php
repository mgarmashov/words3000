@extends('admin.layouts.app')

@section('content')
    <div id="app">
        <div class="container">
            <users-page :header="{{ json_encode($header) }}"></users-page>
            <users-list></users-list>
        </div>
    </div>


@endsection

{{--<script>--}}
    {{--import UsersList from "../../assets/js/components/UsersList";--}}
    {{--export default {--}}
        {{--components: {UsersList}--}}
    {{--}--}}
{{--</script>--}}