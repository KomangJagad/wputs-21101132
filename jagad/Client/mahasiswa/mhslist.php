<div id="konten"></div>

<script>
    const gh = new XMLHttpRequest();
    gh.open("GET","http://localhost/jagad/Server/Mahasiswa/dtmhs.php");
    gh.send();

    gh.onload = function(){
        const dta = JSON.parse(this.responseText);
        var tx ='<h3>List Data Mahasiswa</h3>';
        tx +='<table class="table table-hover"><thead><tr><th scope="col">#</th><th scope="col">NIM</th><th scope="col">Nama Lengkap</th><th scope="col">JenisKelamin</th><th scope="col">Jurusan</th><th scope="col">Tgl Lahir</th><th scope="col"> <a href="main.php?p=mhs&sp=addnew" class="badge bg-primary">Baru</a></th></tr></thead><tbody>';

        let nomor = 1;
        for(i=0;i<dta.length;i++){
            let jkel = "Laki-Laki";
            if(dta[i][3]=="P"){
                jkel = "Perempuan";
            }
            tx +='<tr>';
            tx +='  <th scope="row">'+nomor+'</th>';
            tx +='  <td>'+dta[i][0]+'</td>';
            tx +='  <td>'+dta[i][1]+'</td>';
            tx +='  <td>'+jkel+'</td>';
            tx +='  <td>'+dta[i][2]+'</td>';
            tx +='  <td>'+dta[i][4]+'</td>';
            tx +='  <td> ';
            tx +='<a href="main.php?p=mhs&sp=edit&nim='+dta[i][0]+'" class="badge bg-success">edit</a> ';
            tx +='<a href="main.php?p=mhs&sp=dele&nim='+dta[i][0]+'" class="badge bg-danger">hapus</a> ';
            tx +='</td>';
            tx +='</tr>';
            nomor++;
        }    
        tx +='  </tbody></table>';

        document.getElementById("konten").innerHTML = tx;
    }
</script>