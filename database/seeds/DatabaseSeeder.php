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
            ['via' => 'via dei martiri pennesi', 'ncivico' => 5, 'genereRichiesto' => 'A', 'citta' => 'Genova', 'descrizione' => 'Appartamento per studenti universitari e non, per favore astenersi perditempo', 'dataInizioLocazione' => '2022-08-08', 'titolo' => 'Appartamento a Genova', 'tipologia' => 'A', 'prezzo' => 700, 'dataPubblicazione' => '2022-05-20', 'etaRichiesta' => 18, 'user_id' => 2],

                ['via' => 'via Roma', 'ncivico' => 6, 'genereRichiesto' => 'M', 'citta' => 'Ancona', 'descrizione' => 'Posto letto vicino all università', 'dataInizioLocazione' => '2022-08-09', 'titolo' => 'posto letto per studenti di ancona', 'tipologia' => 'P', 'prezzo' => 200, 'dataPubblicazione' => '2022-05-20', 'etaRichiesta' => 18, 'user_id' => 2],

            ['via' => 'via diaz', 'ncivico' => 4, 'genereRichiesto' => 'F', 'citta' => 'Montesilvano', 'descrizione' => 'Appartamento a montesilvano, zona grandi alberghi', 'dataInizioLocazione' => '2022-07-05', 'titolo' => 'Appartamento montesilvano', 'tipologia' => 'A', 'prezzo' => 3000, 'dataPubblicazione' => '2022-05-20', 'etaRichiesta' => 20, 'user_id' => 2],

                ['via' => 'via Mosca', 'ncivico' => 7, 'genereRichiesto' => 'F', 'citta' => 'Ancona', 'descrizione' => 'Appartamento per studenti e lavoratori', 'dataInizioLocazione' => '2022-07-06', 'titolo' => 'affitto appartamento ad ancona', 'tipologia' => 'A', 'prezzo' => 900, 'dataPubblicazione' => '2022-04-20', 'etaRichiesta' => 21, 'user_id' => 2],

                ['via' => 'via dandolo', 'ncivico' => 9, 'genereRichiesto' => 'A', 'citta' => 'Macerata', 'descrizione' => 'Appartamento carino a magerada', 'dataInizioLocazione' => '2022-07-10', 'titolo' => 'offertissima', 'tipologia' => 'A', 'prezzo' => 400, 'dataPubblicazione' => '2022-05-02', 'etaRichiesta' => 18, 'user_id' => 2],

                ['via' => 'via italia', 'ncivico' => 10, 'genereRichiesto' => 'M', 'citta' => 'Loro Piceno', 'descrizione' => 'Posto letto economico per studenti', 'dataInizioLocazione' => '2022-09-01', 'titolo' => 'posto letto a loro piceno', 'tipologia' => 'P', 'prezzo' => 150, 'dataPubblicazione' => '2022-05-10', 'etaRichiesta' => 18, 'user_id' => 2],

                ['via' => 'via lazio', 'ncivico' => 14,
                'genereRichiesto' => 'M', 'citta' => 'New York', 'descrizione' => 'Offerta di affitto per studenti di new york',
                'dataInizioLocazione' => '2022-06-23', 'titolo' => 'Posto letto a new york', 'tipologia' => 'P', 'prezzo' => 1000, 'dataPubblicazione' => '2022-02-10', 'etaRichiesta' => 19, 'user_id' => 6],

                ['via' => 'via del tutto eccezionale', 'ncivico' => 14,
                'genereRichiesto' => 'M', 'citta' => 'San benedetto del tronto', 'descrizione' => 'Offerta Modesta',
                'dataInizioLocazione' => '2022-10-10', 'titolo' => 'Posto letto per universitari', 'tipologia' => 'P', 'prezzo' => 175, 'dataPubblicazione' => '2022-02-10', 'etaRichiesta' => 18, 'user_id' => 6],
                
                ['via' => 'via Napoli', 'ncivico' => 10,
                'genereRichiesto' => 'F', 'citta' => 'Roma', 'descrizione' => 'Piccola descrizione di Mario Rossi',
                'dataInizioLocazione' => '2022-06-23', 'titolo' => 'Appartamento Ancona', 'tipologia' => 'P', 'prezzo' => 800, 'dataPubblicazione' => '2022-05-24', 'etaRichiesta' => 18, 'user_id' => 6],

                ['via' => 'via Roma', 'ncivico' => 10,
                'genereRichiesto' => 'F', 'citta' => 'Milano', 'descrizione' => 'Piccola descrizione di Mario Rossi',
                'dataInizioLocazione' => '2022-08-01', 'titolo' => 'Appartamento Ancona ProvaImportante', 'tipologia' => 'A', 'prezzo' => 800, 'dataPubblicazione' => '2022-05-24', 'etaRichiesta' => 18, 'user_id' => 6],

                ['via' => 'via Roma', 'ncivico' => 10,
                'genereRichiesto' => 'F', 'citta' => 'Napoli', 'descrizione' => 'Piccola descrizione di loca loca ',
                'dataInizioLocazione' => '2022-07-23', 'titolo' => 'PostoLetto Ancona ProvaImportante', 'tipologia' => 'P', 'prezzo' => 800, 'dataPubblicazione' => '2022-05-24', 'etaRichiesta' => 18, 'user_id' => 6]

            ]);

        DB::table('posto_letto')->insert([
            ['doppia' => true, 'luogoStudio' => true, 'finestra' => false, 'superficie_postoletto' => 20, 'offerta_id' => 2],
            ['doppia' => false, 'luogoStudio' => true, 'finestra' => false, 'superficie_postoletto' => 15, 'offerta_id' => 5],
            ['doppia' => false, 'luogoStudio' => true, 'finestra' => false, 'superficie_postoletto' => 15, 'offerta_id' => 6],           
             ['doppia' => false, 'luogoStudio' => true, 'finestra' => false, 'superficie_postoletto' => 15, 'offerta_id' => 7],
            ['doppia' => 1, 'luogoStudio' => 1, 'finestra' => 0, 'superficie_postoletto' => 15, 'offerta_id' => 11]

        ]);

        DB::table('appartamento')->insert([
            ['loc_ricr' => true, 'npostiletto' => 2, 'ncamere' => 3, 'cucina' => True, 'nbagni' => 2, 'terrazzo' => True, 'superficie' => 120, 'offerta_id' => 1],
            ['loc_ricr' => false, 'npostiletto' => 1, 'ncamere' => 1, 'cucina' => True, 'nbagni' => 2, 'terrazzo' => True, 'superficie' => 110, 'offerta_id' => 3],
            ['loc_ricr' => true, 'npostiletto' => 2, 'ncamere' => 3, 'cucina' => True, 'nbagni' => 1, 'terrazzo' => FALSE, 'superficie' => 90, 'offerta_id' => 4],
            ['loc_ricr' => true, 'npostiletto' => 2, 'ncamere' => 3, 'cucina' => True, 'nbagni' => 1, 'terrazzo' => FALSE, 'superficie' => 90, 'offerta_id' => 8],            ['loc_ricr' => true, 'npostiletto' => 2, 'ncamere' => 3, 'cucina' => True, 'nbagni' => 1, 'terrazzo' => FALSE, 'superficie' => 90, 'offerta_id' => 4],
            ['loc_ricr' => true, 'npostiletto' => 2, 'ncamere' => 3, 'cucina' => True, 'nbagni' => 1, 'terrazzo' => FALSE, 'superficie' => 90, 'offerta_id' => 9],
            ['loc_ricr' => 1, 'npostiletto' => 2, 'ncamere' => 3, 'cucina' => 0, 'nbagni' => 1, 'terrazzo' => FALSE, 'superficie' => 900, 'offerta_id' => 10]
        ]);
        DB::table('faq')->insert([
            ['domanda' => 'è gratis?','risposta'=> 'Certo!!! la nostra non è un\' organizzazione a scopo di lucro. ',],
            ['domanda' => 'Come posso registrarmi?','risposta'=> 'è semplicissimo!!! basta cliccare sul bottone di registrazione nella sezione accedi',],
            ['domanda' => 'Che dati devo inserire per la registrazione?','risposta'=> 'Sia nel caso di un utente locatore che nel caso di un utente studente bisogna inserire: nome, cognome, data di nascita, sesso, username e password',],
            ['domanda' => 'FORZA MILAN','risposta'=> 'SEMPREEEEEE!!!',]
        ]);

        DB::table('fotos')->insert([
            ['nome_file' => 'missing_foto.jpg','offerta_id'=> '1',],
            ['nome_file' => 'missing_foto.jpg','offerta_id'=> '2',],
            ['nome_file' => 'missing_foto.jpg','offerta_id'=> '3',],
            ['nome_file' => 'missing_foto.jpg','offerta_id'=> '4',],
            ['nome_file' => 'missing_foto.jpg','offerta_id'=> '5',],
            ['nome_file' => 'missing_foto.jpg','offerta_id'=> '6',],
            ['nome_file' => 'missing_foto.jpg','offerta_id'=> '7',],
            ['nome_file' => 'missing_foto.jpg','offerta_id'=> '8',],
            ['nome_file' => 'missing_foto.jpg','offerta_id'=> '9',],
            ['nome_file' => 'missing_foto.jpg','offerta_id'=> '10',],
            ['nome_file' => 'missing_foto.jpg','offerta_id'=> '11',],
        ]);

        DB::table('opzionamento')->insert([

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
