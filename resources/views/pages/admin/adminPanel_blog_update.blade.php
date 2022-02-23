@extends('layout.index')

@section('title')
    Admin Panel
@endsection

@section('content')
    <div>
        <div class="divAdminTable">
            <div style="width:500px;">
                <h3 class="naslovAdminTable" class="nav-link">Izmeni blog</h3>
            </div>
            @if($errors->any())
                <div class="alert alert-danger" style="margin-left: 280px;margin-right: 700px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="move_right poruka">
                @empty(!session('poruka'))
                    {{session('poruka')}}
                @endempty
            </div>
            <form action="{{route('doAdminPanel_blog_update',['id_blog'=>$blog->id_blog])}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <table class="adminTable">
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Naslov bloga:</td>
                        <td style="padding-top: 15px;">
                            <input type="text" name="tbNaslovBlog" id="tbNaslovBlog" value="{{$blog->naslov_blog}}"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Podnaslov bloga:</td>
                        <td style="padding-top: 25px;">
                            <textarea rows="8" cols="80"  name="tbPodnaslovBlog" id="tbPodnaslovBlog" >{{$blog->podnaslov_blog}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Tekst bloga:</td>
                        <td style="padding-top: 25px;">
                            <textarea rows="8" cols="80" name="tbTekstBlog" id="tbTekstBlog" >{{$blog->text_blog}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Slika:</td>
                        <td style="padding-top: 25px;">  <img class="img-fluid" src="{{asset('/')}}img/{{$blog->putanja_slika_blog}}" width="200px" height="250px" alt="{{$blog->naslov_blog}}"/></td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Izmeni sliku:</td>
                        <td style="padding-top: 15px;">
                            <input type="file" name="unosSlike" id="unosSlike" placeholder="Unesite sliku"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Status:</td>
                        <td style="padding-top: 15px;">
                            <select id="ddlBlog" name="ddlBlog">
                                @if($blog->status == '0')
                                    <option value="0" selected>Neaktivan</option>
                                    <option value="1">Aktivan</option>
                                @else($blog->status == '1')
                                    <option value="0">Neaktivan</option>
                                    <option value="1" selected>Aktivan</option>
                                @endif
                            </select>
                        </td>
                    </tr>
                    <tr  >
                        <td colspan="2" align="center" style="padding-bottom:5px;padding-top: 15px;">
                            <input type="submit" name="btnIzmeni" id="btnIzmeni" value="Izmeni"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    </div>
    </div>

    </section>

@endsection