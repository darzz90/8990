@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-dark">
                    <div class="panel-heading">User Rights</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <form>
                                    <a href="{{ url('user_type') }}" class="btn btn-dark"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp; Back</a>
                                    &nbsp;&nbsp;&nbsp;
                                    <button class="btn btn-primary">
                                        <span class="glyphicon glyphicon-save"></span>&nbsp;Save
                                    </button>
                                    <button class="btn btn-warning" type="reset">
                                        <span class="glyphicon glyphicon-retweet"></span>&nbsp;Reset
                                    </button>
                                    <br>
                                    <fieldset style="margin-top: 20px;">
                                        <legend>{{ $user_type }}&nbsp; Rights</legend>
                                        <label>
                                            <input type="checkbox" id="check_all_rights">
                                            &nbsp;Check all rights
                                        </label>

                                        <table class="table table-responsive" style="margin-top: 10px;">
                                            <thead>
                                                <tr>
                                                    <td>Menu Title</td>
                                                    <td>Menu</td>
                                                    <td>
                                                        <label>
                                                            <input type="checkbox" id="can_add_column" class="rights_column">
                                                            &nbsp;Add
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label>
                                                            <input type="checkbox" id="can_delete_column" class="rights_column">
                                                            &nbsp;Delete
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label>
                                                            <input type="checkbox" id="can_edit_column" class="rights_column">
                                                            &nbsp;Edit
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label style="vertical-align: middle;">
                                                            <input type="checkbox" id="can_view_column" class="rights_column">
                                                            &nbsp;View
                                                        </label>
                                                    </td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($rights as $object)
                                                    <tr>
                                                        <td>{{ ucwords($object->menuTitle) }}</td>
                                                        <td>
                                                            @if($object->sub_menu == 1)
                                                                Sub Menu
                                                            @else
                                                                Main Menu
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" name="CanAdd[]" class="can_add rights">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" name="CanDelete[]" class="can_delete rights">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" name="CanEdit[]" class="can_edit rights">
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" name="CanView[]" class="can_view rights">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#check_all_rights").change(function(){
                if(this.checked){
                    $(".rights").prop('checked',true);
                    $(".rights_column").prop('checked',true);
                }else{
                    $(".rights").prop('checked',false);
                    $(".rights_column").prop('checked',false);
                }
            });
            $("#can_add_column").change(function(){
               if(this.checked){
                    if($(".can_add").checked){
                        $(".can_add").prop('checked',false);
                    }else{
                        $(".can_add").prop('checked',true);
                    }
               }else{
                   if($(".can_add").checked){
                       $(".can_add").prop('checked',true);
                   }else{
                       $(".can_add").prop('checked',false);
                   }
               }
            });
            $("#can_delete_column").change(function(){
                if(this.checked){
                    if($(".can_delete").checked){
                        $(".can_delete").prop('checked',false);
                    }else{
                        $(".can_delete").prop('checked',true);
                    }
                }else{
                    if($(".can_delete").checked){
                        $(".can_delete").prop('checked',true);
                    }else{
                        $(".can_delete").prop('checked',false);
                    }
                }
            });
            $("#can_edit_column").change(function(){
                if(this.checked){
                    if($(".can_edit").checked){
                        $(".can_edit").prop('checked',false);
                    }else{
                        $(".can_edit").prop('checked',true);
                    }
                }else{
                    if($(".can_edit").checked){
                        $(".can_edit").prop('checked',true);
                    }else{
                        $(".can_edit").prop('checked',false);
                    }
                }
            });
            $("#can_view_column").change(function(){
                if(this.checked){
                    if($(".can_view").checked){
                        $(".can_view").prop('checked',false);
                    }else{
                        $(".can_view").prop('checked',true);
                    }
                }else{
                    if($(".can_view").checked){
                        $(".can_view").prop('checked',true);
                    }else{
                        $(".can_view").prop('checked',false);
                    }
                }
            });
        });
    </script>
@endsection
