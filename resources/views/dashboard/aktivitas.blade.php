<html>

<h4>test</h4>
@foreach($aktivitas as $a)
    <h4>mahasiswa dengan id : {{$a->mahasiswa_id}} aktivitas terkait ->
    @foreach($a->aktivitasList as $act)
        {{$act->aktivitas_id}}</h4>
    @endforeach
@endforeach

</html>

<!-----------------------------------------------------------------------------------------------
Penjelasan:
di laravel karena format file nya ada judul'.blade.php' jadi bisa nge akses logika
php pake '@' jadi bisa '@'if, '@'for, @foreach dll, terus ditutup nya mereka pake kata 'end'
jadi kalo buka @if ditutup pake @endif, @for pake @endfor, dan seterusnya.
-------------------------------------------------------------------------------------------------
$aktivitas dari mana? dari file aktivitasController dia kan ada kode gini ya
        'return view('dashboard.aktivitas', ['aktivitas' => $aktivitas]);'
diakhir tu ada yang didalem kurung [] 'aktivitas' => $aktivitas,
$aktivitas nya itu variabel yang dikasih data di controller nya.
'aktivitas' tu nama variabel buat diakses di view nya, kalo misalnya nama variabelnya 'raihan'
nanti diakses di view nya $raihan gitu..
------------------------------------------------------------------------------------------------>

