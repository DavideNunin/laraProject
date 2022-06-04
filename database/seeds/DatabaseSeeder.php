<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['data_nascita' => '2000-08-10','nome' => 'Gennaro', 'cognome' => 'Bullo', 'username' => 'gennarobullo', 'password' => Hash::make('lol'), 'tipologia' => 's', 'sesso' => 'M', 'telefono' => '3333333333',],
            ['data_nascita' => '2000-08-10','nome' => 'Mario', 'cognome' => 'Rossi', 'username' => 'mario.rossi', 'password' => Hash::make('lol'), 'tipologia' => 'l', 'sesso' => 'M', 'telefono' => '3333333333',],
            ['data_nascita' => '2000-08-10','nome' => 'Giovanni', 'cognome' => 'IlMatto', 'username' => 'giovanni.matto', 'password' => Hash::make('lol'), 'tipologia' => 's', 'sesso' => 'M', 'telefono' => '3333333333',],   
            ['data_nascita' => '2005-08-10','nome' => 'Gaia', 'cognome' => 'Turbo', 'username' => 'TurboFregna05', 'password' => Hash::make('sagittario'), 'tipologia' => 's', 'sesso' => 'F', 'telefono' => '5235656498',],  
            ['data_nascita' => '2005-08-10','nome' => 'mino', 'cognome' => 'ad', 'username' => 'admin', 'password' => Hash::make('admin'), 'tipologia' => 'a', 'sesso' => 'F', 'telefono' => '5235656498',],
            ['data_nascita' => '2005-08-10','nome' => 'loca', 'cognome' => 'loca', 'username' => 'localoca', 'password' => Hash::make('localoca'), 'tipologia' => 'l', 'sesso' => 'F', 'telefono' => '5235656498',],
            ['data_nascita' => '2005-08-10','nome' => 'lario', 'cognome' => 'lario', 'username' => 'lariolario', 'password' => Hash::make('lariolario'), 'tipologia' => 's', 'sesso' => 'M', 'telefono' => '5235656498',]   
        ]);

        DB::table('offerta')->insert([
            ['via' => 'via 1', 'ncivico' => 5, 'genereRichiesto' => 'M', 'citta' => 'Ancona', 'descrizione' => 'DESC1', 'periodo' => '3 mesi', 'titolo' => 'offerta 1', 'tipologia' => 'A', 'prezzo' => 3000, 'dataPubblicazione' => '2022-05-20', 'etaRichiesta' => 18, 'user_id' => 3],

                ['via' => 'via 2', 'ncivico' => 6, 'genereRichiesto' => 'M', 'citta' => 'Ancona', 'descrizione' => 'DESC2', 'periodo' => '6 mesi', 'titolo' => 'offerta 2', 'tipologia' => 'P', 'prezzo' => 200, 'dataPubblicazione' => '2022-05-20', 'etaRichiesta' => 18, 'user_id' => 3],

            ['via' => 'via 3', 'ncivico' => 4, 'genereRichiesto' => 'F', 'citta' => 'Montesilvano', 'descrizione' => 'era una casa piccina piccina senza soff...', 'periodo' => '3 mesi', 'titolo' => 'offerta pazzesca', 'tipologia' => 'a', 'prezzo' => 3000, 'dataPubblicazione' => '2022-05-20', 'etaRichiesta' => 18, 'user_id' => 3],

                ['via' => 'via 3', 'ncivico' => 7, 'genereRichiesto' => 'F', 'citta' => 'Ancona', 'descrizione' => 'DESC3', 'periodo' => '1 anno', 'titolo' => 'offerta 3', 'tipologia' => 'A', 'prezzo' => 500, 'dataPubblicazione' => '2022-04-20', 'etaRichiesta' => 18, 'user_id' => 3],

                ['via' => 'via 4', 'ncivico' => 9, 'genereRichiesto' => 'F', 'citta' => 'Ancona', 'descrizione' => 'DESC4', 'periodo' => '9 mesi', 'titolo' => 'offertissima', 'tipologia' => 'A', 'prezzo' => 400, 'dataPubblicazione' => '2022-05-02', 'etaRichiesta' => 18, 'user_id' => 3],

                ['via' => 'via 6', 'ncivico' => 10, 'genereRichiesto' => 'F', 'citta' => 'Ancona', 'descrizione' => 'DESC5', 'periodo' => '10 mesi', 'titolo' => 'offerta 5', 'tipologia' => 'P', 'prezzo' => 800, 'dataPubblicazione' => '2022-05-10', 'etaRichiesta' => 18, 'user_id' => 3],

                ['via' => 'via lazio', 'ncivico' => 14,
                'genereRichiesto' => 'M', 'citta' => 'New York', 'descrizione' => 'Offerta di affitto per studenti di new york',
                'periodo' => '1 Anno', 'titolo' => 'Sere Nere', 'tipologia' => 'P', 'prezzo' => 10000, 'dataPubblicazione' => '2022-02-10', 'etaRichiesta' => 18, 'user_id' => 3],

                ['via' => 'via del tutto eccezionale', 'ncivico' => 14,
                'genereRichiesto' => 'M', 'citta' => 'New York', 'descrizione' => 'Offerta Modesta',
                'periodo' => '1 Anno', 'titolo' => 'Rosso Relativo', 'tipologia' => 'P', 'prezzo' => 10000, 'dataPubblicazione' => '2022-02-10', 'etaRichiesta' => 18, 'user_id' => 3],
                
                ['via' => 'via Roma', 'ncivico' => 10,
                'genereRichiesto' => 'F', 'citta' => 'Ancona', 'descrizione' => 'Piccola descrizione di Mario Rossi',
                'periodo' => '10 mesi', 'titolo' => 'Appartamento Ancona', 'tipologia' => 'P', 'prezzo' => 800, 'dataPubblicazione' => '2022-05-24', 'etaRichiesta' => 18, 'user_id' => 2],

                ['via' => 'via Roma', 'ncivico' => 10,
                'genereRichiesto' => 'F', 'citta' => 'Ancona', 'descrizione' => 'Piccola descrizione di Mario Rossi',
                'periodo' => '10 mesi', 'titolo' => 'Appartamento Ancona ProvaImportante', 'tipologia' => 'A', 'prezzo' => 800, 'dataPubblicazione' => '2022-05-24', 'etaRichiesta' => 18, 'user_id' => 2],

                ['via' => 'via Roma', 'ncivico' => 10,
                'genereRichiesto' => 'F', 'citta' => 'Ancona', 'descrizione' => 'Piccola descrizione di Mario Rossi',
                'periodo' => '10 mesi', 'titolo' => 'PostoLetto Ancona ProvaImportante', 'tipologia' => 'P', 'prezzo' => 800, 'dataPubblicazione' => '2022-05-24', 'etaRichiesta' => 18, 'user_id' => 2]

            ]);

        DB::table('posto_letto')->insert([
            ['doppia' => true, 'luogoStudio' => true, 'finestra' => false, 'superficie_postoletto' => 20, 'offerta_id' => 2],
            ['doppia' => false, 'luogoStudio' => true, 'finestra' => false, 'superficie_postoletto' => 15, 'offerta_id' => 5],
            ['doppia' => 1, 'luogoStudio' => 1, 'finestra' => 0, 'superficie_postoletto' => 15, 'offerta_id' => 11]

        ]);

        DB::table('appartamento')->insert([
            ['loc_ricr' => true, 'npostiletto' => 2, 'ncamere' => 3, 'cucina' => True, 'nbagni' => 2, 'terrazzo' => True, 'superficie' => 120, 'offerta_id' => 1],
            ['loc_ricr' => false, 'npostiletto' => 1, 'ncamere' => 1, 'cucina' => True, 'nbagni' => 2, 'terrazzo' => True, 'superficie' => 110, 'offerta_id' => 3],
            ['loc_ricr' => true, 'npostiletto' => 2, 'ncamere' => 3, 'cucina' => True, 'nbagni' => 1, 'terrazzo' => FALSE, 'superficie' => 90, 'offerta_id' => 4],
            ['loc_ricr' => 1, 'npostiletto' => 2, 'ncamere' => 3, 'cucina' => 0, 'nbagni' => 1, 'terrazzo' => FALSE, 'superficie' => 900, 'offerta_id' => 10]
        ]);
        DB::table('faq')->insert([
            ['domanda' => 'è gratis?','risposta'=> 'Certo!!! la nostra non è un\' organizzazione a scopo di lucro. ',],
            ['domanda' => 'Come posso registrarmi?','risposta'=> 'è semplicissimo!!! basta cliccare sul bottone di registrazione nella sezione accedi',],
            ['domanda' => 'Che dati devo inserire per la registrazione?','risposta'=> 'Sia nel caso di un utente locatore che nel caso di un utente studente bisogna inserire: nome, cognome, data di nascita, sesso, username e password',],
            ['domanda' => 'FORZA MILAN','risposta'=> 'SEMPREEEEEE!!!',]
        ]);

        DB::table('fotos')->insert([
            ['nome_file' => 'test-image-1.jpg','offerta_id'=> '1',],
            ['nome_file' => 'test-image-2.jpg','offerta_id'=> '2',],
            ['nome_file' => 'test-image-3.jpg','offerta_id'=> '3',],
            ['nome_file' => 'test-image-3.jpg','offerta_id'=> '1',],
            ['nome_file' => 'test-image-1.jpg','offerta_id'=> '2',],
            ['nome_file' => 'test-image-2.jpg','offerta_id'=> '3',],
            ['nome_file' => 'missing_foto.jpg','offerta_id'=> '11',],
            ['nome_file' => 'missing_foto.jpg','offerta_id'=> '10',],
        ]);

        DB::table('opzionamento')->insert([
            ['data' => '2022-05-20', 'user_id' => 1, 'offerta_id' => '3'],
            ['data' => '2022-05-20', 'user_id' => 3, 'offerta_id' => '3'],
            ['data' => '2022-05-20', 'user_id' => 1, 'offerta_id' => '10'],
            ['data' => '2022-05-20', 'user_id' => 1, 'offerta_id' => '11'],
            ['data' => '2022-05-20', 'user_id' => 3, 'offerta_id' => '11']



        ]);

        DB::table('contratto')->insert([
            ['dataStipula' => '2022-05-10', 'studente_id' => 1, 'locatore_id' => 2, 'offerta_id' => 6],
            ['data' => '2022-05-20', 'studente_id' => 3, 'locatore_id' => 2, 'offerta_id' => 6]
        ]);

        DB::table('messaggio')->insert([
            ['testo' => 'testo primo messaggio', 'letto' => 0, 'data_ora_invio' => '2008-11-11 13:23:44'],
            ['testo' => 'testo secondo messaggio', 'letto' => 0, 'data_ora_invio' => '2009-11-11 13:23:44'],
            ['testo' => 'testo terzo messaggio', 'letto' => 1, 'data_ora_invio' => '2009-11-11 13:23:45'],
        ]);

        DB::table('chat')->insert([
            ['mittente' => 7, 'messaggio' => 1, 'destinatario' => 6,],
            ['mittente' => 4, 'messaggio' => 1, 'destinatario' => 6,],
            ['mittente' => 6, 'messaggio' => 2, 'destinatario' => 4,],
            ['mittente' => 4, 'messaggio' => 3, 'destinatario' => 6,],
            ['mittente' => 6, 'messaggio' => 2, 'destinatario' => 1,],
        ]);
    }
}
