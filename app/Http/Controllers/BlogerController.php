<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use App\Models\Tretman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogerController extends BaseFrontendController
{
    public function blog()
    {
        $blog = new Blog();
        $tretmani = new Tretman();
        try {
            $this->data['tretmani'] = $tretmani->getTretamane();
            $this->data['blog'] = $blog->getAllBloger();
            return view('pages.blog.blog', $this->data);
        } catch (\Exception $ex) {
            \Log::error("Greska:" . $ex->getMessage());
        }
    }

    public function oneBlog($id_blog)
    {
        $blog = new Blog();
        try {
            $this->data['oneBlog'] = $blog->getOne($id_blog);
            return view('pages.blog.oneBlog', ['id_blog' => $id_blog], $this->data);
        } catch (\Exception $ex) {
            \Log::error("Greska:" . $ex->getMessage());
        }
    }

    public function blog_blog()
    {
        $blog = new Blog();
        try {
            $this->data['blog'] = $blog->getAllAdmin();
            return view('pages.blog.sviBlogovi', $this->data);
        } catch (\Exception $ex) {
            \Log::error("Greska:" . $ex->getMessage());
        }
    }

    public function blog_insert()
    {
        return view('pages.blog.unosBlog', $this->data);
    }

    public function doBlog_insert(BlogRequest $request)
    {
        if ($request->has('btnDodaj')) {
            $naslov = $request->input('tbNaslovBlog');
            $podnaslov = $request->input('tbPodnaslovBlog');
            $tekst = $request->input('tbTekstBlog');
            $slika = $request->file('unosSlike');
//            dd($slika);

            if ($slika) {
                $tmp_path = $slika->getPathname();
                $extension = $slika->getClientOriginalExtension();
                $slika_ime = time() . '.' . $extension;
                $new_path = 'img/' . $slika_ime;

                $pak = File::move($tmp_path, $new_path);

                if ($pak) {
                    $blog = new Blog();
                    $blog->naslov_blog = $naslov;
                    $blog->podnaslov_blog = $podnaslov;
                    $blog->text_blog = $tekst;
                    $blog->putanja_slika_blog = $slika_ime;
                    $blog->postavljeno = time();
                    $blog->status = '1';

                    try {
                        $rez = $blog->save();
                        if ($rez) {
                            return redirect()->route('all_blog')->with('poruka', "Uspešno ste uneli blog!");
                        } else {
                            return redirect()->route('blog_insert')->with('poruka', "Neuspešan unos bloga!");
                        }
                    } catch (\Exception $ex) {
                        \Log::error("Greska:" . $ex->getMessage());
                    }
                }
            } else {
                return redirect()->route('blog_insert')->with('poruka', "Morate odabrati sliku!");
            }
        }
    }

    public function blog_update($id_blog)
    {
        $blog = new Blog();
        $blog->id_blog = $id_blog;
        try {
            $this->data['blog'] = $blog->getOne($id_blog);
            // dd($this->data['blog']);
            return view('pages.blog.izmeniBlog', $this->data);
        } catch (\Exception $ex) {
            \Log::error("Greska:" . $ex->getMessage());
        }

//        return view('pages.blog.izmeniBlog',['id_blog'=>$id_blog],$this->data);
    }

    public function doBlog_update($id_blog, Request $request)
    {
        if ($request->has('btnIzmeni')) {
//            dd($id_blog);
            $naslov = $request->input('tbNaslovBlog');
            $podnaslov = $request->input('tbPodnaslovBlog');
            $tekst = $request->input('tbTekstBlog');
            $status = $request->input('ddlBlog');
            $slika = $request->file('unosSlike');
            if ($slika) {
                $tmp_path = $slika->getPathname();
                $extension = $slika->getClientOriginalExtension();
                $slika_ime = time() . '.' . $extension;
                $new_path = 'img/' . $slika_ime;

                if (File::move($tmp_path, $new_path)) {
                    $newBlog = Blog::find($id_blog);
                    $newBlog->naslov_blog = $naslov;
                    $newBlog->podnaslov_blog = $podnaslov;
                    $newBlog->text_blog = $tekst;
                    $newBlog->putanja_slika_blog = $slika_ime;
                    $newBlog->postavljeno = time();
                    $newBlog->status = $status;
                    try {
                        $rez = $newBlog->save();
                        if ($rez) {
                            return redirect()->route('all_blog')->with('poruka', 'Uspešno ste izmenili blog sa slikom!');
                        } else {
                            return redirect()->route('izmeniBlog', ['id_blog' => $id_blog])->with('poruka', "Neuspešna izmena bloga sa slikom!");
                        }
                    } catch (\Exception $ex) {
                        \Log::error("Greska:" . $ex->getMessage());
                    }
                } else {
                    return redirect()->route('izmeniBlog', ['id_blog' => $id_blog])->with('poruka', "Greka!Neuspešna izmena bloga!");
                }
            } else {
                $newBlog = Blog::find($id_blog);
                $newBlog->naslov_blog = $naslov;
                $newBlog->podnaslov_blog = $podnaslov;
                $newBlog->text_blog = $tekst;
                $newBlog->postavljeno = time();
                $newBlog->status = $status;
                try {
                    $rez = $newBlog->save();
                    if ($rez) {
                        return redirect()->route('all_blog')->with('poruka', 'Uspešno ste izmenili blog!');
                    } else {
                        return redirect()->route('izmeniBlog', ['id_blog' => $id_blog])->with('poruka', "Neuspešna izmena bloga!");
                    }
                } catch (\Exception $ex) {
                    \Log::error("Greska:" . $ex->getMessage());
                }
            }
        }


    }

    public function blog_delete($id_blog)
    {
        $blog = new Blog();
        $blog->id_blog = $id_blog;
        $thisBlog = $blog->getOne($id_blog);
//        dd($thisBlog);
        try {
            if ($thisBlog->status == 1) {
                $blog->deleteOne($id_blog);
                return redirect()->route('all_blog')->with('poruka', 'Uspešno deaktiviranje bloga!');
            } else {
                $blog->realDeleteOne($id_blog);
                return redirect()->route('all_blog')->with('poruka', 'Uspešno brisanje bloga!');
            }
        } catch (\Exception $ex) {
            \Log::error("Greska:" . $ex->getMessage());
        }
    }

    public function sortByDateBlog(Request $request)
    {
        $unos = $request->post('unos'); //2021-09-11
//        return json_encode($unos);
        list($year_sort, $month_sort, $day_sort) = explode('-', $unos);
//        dd($day_sort);

        $blog = new Blog();
        $rez = $blog->getAll();
//    return json_encode($rez);
        $podaci = null;
        $array = null;

        $podaci .= "<table class='table table-striped adminTable'>";
        $podaci .= "<thead>";
        $podaci .= "<tr>";
        $podaci .= "<th scope='col'>#</th>";
        $podaci .= "<th scope='col'>Naslov</th>";
        $podaci .= "<th scope='col'>Podnaslov</th>";
        $podaci .= "<th scope='col'>Text</th>";
        $podaci .= "<th scope='col'>Slika</th>";
        $podaci .= "<th scope='col'>Postavljeno</th>";
        $podaci .= "<th scope='col'>Status</th>";
        $podaci .= "<th scope='col'>Izmeni</th>";
        $podaci .= "<th scope='col'>Obrisi</th>";
        $podaci .= "</tr>";
        $podaci .= "</thead>";
        $podaci .= "<tbody>";
        $i = 1;
        foreach ($rez as $b) {
            $array .= $b->id_blog;
//                        dd($b->postavljeno);
            $date = date("Y-m-d", $b->postavljeno);

            list($year, $month, $day) = explode('-', $date);
            //dd($day);
            if ($unos == $date) {
                $podaci .= "<tr>";
                $podaci .= "<th scope='row'>" . $i . "</th>";
                $i++;
                $podaci .= "<td>" . $b->naslov_blog . "</td>";
                $podaci .= "<td>" . $b->podnaslov_blog . "</td>";
                $podaci .= "<td>" . $b->text_blog . "</td>";
                $podaci .= "<td><img class='img-fluid' src='" . asset('/') . "img/" . $b->putanja_slika_blog . " ' width='200px' height='250px' alt='" . $b->naslov_blog . "'/></td>";
                $podaci .= "<td>" . date('d.m.Y.', $b->postavljeno) . "</td>";
                if ($b->status == 1) {
                    $podaci .= "<td>Aktivan</td>";
                } else {
                    $podaci .= "<td>Neaktivan</td>";
                }
                $podaci .= "<td><a class='linkA'  href='" . route('blog_update', ['id_blog' => $b->id_blog]) . "'>Izmeni</a></td>";
                $podaci .= "<td><a  class='linkA'  href='" . route('blog_delete', ['id_blog' => $b->id_blog]) . "''>Obrisi</a></td>";
                $podaci .= "</tr>";
            }
        }
        $podaci .= "</tbody>";
        $podaci .= "</table>";
        return json_encode($podaci);

    }

    public function searchBlog(Request $request)
    {
        if ($request->has('btnSearch')) {
            $unos = $request->post('unos');

            $blog = new Blog();
            $rez = $blog->searchBlog($unos);
            //dd($rez);

            $podaci = null;

            //return json_encode($rez);
            foreach ($rez as $item) {
                $podaci .= "<article class='blog_item'>";
                $podaci .= "<div class='blog_item_img'>";
                $podaci .= "<img class='card-img rounded-0' width='400px' height='400px' src='" . asset('/') . "img/" . $item->putanja_slika_blog . "' alt='" . $item->naslov_blog . "'>";
                $podaci .= "</div>";
                $podaci .= "<div class='blog_details'>";
                $podaci .= "<a class='d-inline-block' href='" . route('one_Blog', ['id_blog' => $item->id_blog]) . "'>";
                $podaci .= "<h2>" . $item->naslov_blog . "</h2>";
                $podaci .= "</a>";
                $podaci .= "<h4>" . $item->podnaslov_blog . "</h4>";
                $podaci .= "<p>";
                $podaci .= substr($item->text_blog, 0, 200);
                $podaci .= "(...)</p>";
                $podaci .= "<b><a href='" . route('one_Blog', ['id_blog' => $item->id_blog]) . "' style='color:#B08EAD;'>Više</a></b>";
                $podaci .= "</div>";
                $podaci .= "</article>";
            }
            return json_encode($podaci);
        }
    }
}
