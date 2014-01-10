stmiki-2013_1-webter_absensi
============================

Tugas akhir semester Web Terapan

## Gambaran Umum

Aplikasi absensi mahasiswa dimana waktu keluar dan waktu masuk mahasiswa setelah dibandingkan dengan waktu perkuliahan didapat nilai untuk keterangan (Terlambat, Tepat Waktu, Keluar Terlalu cepat).

## Database


### Entities

```

Mahasiswa {*id, nim, nama}
  
Matakuliah {*id, nama}
  
Hari {*id, nama}
  
Jadwal {*id, matakuliah_id*, hari_id*, mulai, selesai}
  
Perkuliahan {*id, matakuliah_id*, pertemuan, tanggal, mulai, selesai}
  
Kehadiran {*id, perkuliahan_id*, mahasiswa_id*, masuk, keluar}

```
  

### Relationships

```

[Jadwal] 1--* [Matakuliah]

[Jadwal] 1--* [Hari]

[Perkuliahan] 1--* [Matakuliah]

[Kehadiran] 1--* [Perkuliahan]

[Kehadiran] 1--* [Mahasiswa]

```

 
