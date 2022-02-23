@extends('layout.index')

@section('title')
    Admin Panel
@endsection

@section('content')
    <div>
        <div class="divAdminTable">
            <div style="width:500px;">
                <h3 class="naslovAdminTable" class="nav-link">Unesi blog</h3>
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
            <form action="{{route('doAdminPanel_blog_insert')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <table class="adminTable">
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Naslov bloga:</td>
                        <td style="padding-top: 15px;">
                            <input type="text" name="tbNaslovBlog" id="tbNaslovBlog" placeholder="Unesi naslov bloga"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Podnaslov bloga:</td>
                        <td style="padding-top: 25px;">
                            <textarea rows="8" cols="80"  name="tbPodnaslovBlog" id="tbPodnaslovBlog" placeholder="Unesi podnaslov bloga"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Tekst bloga:</td>
                        <td style="padding-top: 25px;">
                            <textarea rows="8" cols="80" name="tbTekstBlog" id="tbTekstBlog" placeholder="Unesi tekst bloga"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Unesi sliku:</td>
                        <td style="padding-top: 15px;">
                           <input type="file" name="unosSlike" id="unosSlike" />
                        </td>
                    </tr>
                    <tr  >
                        <td colspan="2" align="center" style="padding-bottom:5px;padding-top: 15px;">
                            <input type="submit" name="btnDodaj" id="btnDodaj" value="Dodaj"/>
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