stmiki-2013_1-webter_absensi
============================

Tugas akhir semester Web Terapan

## Database


### Entities

```javascript
Mahasiswa {*id, nim, nama}
  
Matakuliah {*id, nama}
  
Hari {*id, nama}
  
Jadwal {*id, matakuliah_id*, hari_id*, mulai, selesai}
  
Perkuliahan {*id, matakuliah_id*, pertemuan, tanggal, mulai, selesai}
  
Kehadiran {*id, perkuliahan_id*, mahasiswa_id*, masuk, keluar}
```
  

### Relationships

```javascript
[Jadwal] 1--* [Matakuliah]

[Jadwal] 1--* [Hari]

[Perkuliahan] 1--* [Matakuliah]

[Kehadiran] 1--* [Perkuliahan]

[Kehadiran] 1--* [Mahasiswa]
```

 
