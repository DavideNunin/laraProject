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
        DB::table('utente')->insert([
            ['data_nascita' => '2000-08-10','nome' => 'Gennaro', 'cognome' => 'Bullo', 'username' => 'gennaro.bullo', 'password' => 'lol', 'tipologia' => 's', 'sesso' => 'M', 'telefono' => '3333333333',],
            ['data_nascita' => '2000-08-10','nome' => 'Mario', 'cognome' => 'Rossi', 'username' => 'mario.rossi', 'password' => 'lol', 'tipologia' => 'l', 'sesso' => 'M', 'telefono' => '3333333333',]

        ]);

        DB::table('offerta')->insert([
            ['via' => 'via 1', 'ncivico' => 5,
                'genereRichiesto' => 'M', 'citta' => 'Ancona', 'descrizione' => 'DESC1',
                'periodo' => '3 mesi', 'titolo' => 'offerta 1', 'tipologia' => 'a', 'prezzo' => 3000, 'etaRichiesta' => 18, 'user_id' => 'gennaro.bullo'],
                ['via' => 'via 2', 'ncivico' => 6,
                'genereRichiesto' => 'M', 'citta' => 'Ancona', 'descrizione' => 'DESC2',
                'periodo' => '6 mesi', 'titolo' => 'offerta 2', 'tipologia' => 'p', 'prezzo' => 200, 'etaRichiesta' => 18, 'user_id' => 'gennaro.bullo'],
                ['via' => 'via 3', 'ncivico' => 7,
                'genereRichiesto' => 'F', 'citta' => 'Ancona', 'descrizione' => 'DESC3',
                'periodo' => '1 anno', 'titolo' => 'offerta 3', 'tipologia' => 'a', 'prezzo' => 500, 'etaRichiesta' => 18, 'user_id' => 'gennaro.bullo'],
                ['via' => 'via 4', 'ncivico' => 9,
                'genereRichiesto' => 'F', 'citta' => 'Ancona', 'descrizione' => 'DESC4',
                'periodo' => '9 mesi', 'titolo' => 'offertissima', 'tipologia' => 'a', 'prezzo' => 400, 'etaRichiesta' => 18, 'user_id' => 'gennaro.bullo'],
                ['via' => 'via 6', 'ncivico' => 10,
                'genereRichiesto' => 'F', 'citta' => 'Ancona', 'descrizione' => 'DESC5',
                'periodo' => '10 mesi', 'titolo' => 'offerta 5', 'tipologia' => 'p', 'prezzo' => 800, 'etaRichiesta' => 18, 'user_id' => 'gennaro.bullo'],
                
                ['via' => 'via Roma', 'ncivico' => 10,
                'genereRichiesto' => 'F', 'citta' => 'Ancona', 'descrizione' => 'Piccola descrizione di Mario Rossi',
                'periodo' => '10 mesi', 'titolo' => 'Appartamento Ancona', 'tipologia' => 'p', 'prezzo' => 800, 'etaRichiesta' => 18, 'user_id' => 'mario.rossi']
        ]);

        DB::table('posto_letto')->insert([
            ['doppia' => true, 'luogoStudio' => true, 'finestra' => false, 'superficie' => 20, 'offerta_id' => 2],
            ['doppia' => false, 'luogoStudio' => true, 'finestra' => false, 'superficie' => 15, 'offerta_id' => 5]
        ]);

        DB::table('appartamento')->insert([
            ['loc_ricr' => true, 'npostiletto' => 2, 'ncamere' => 3, 'cucina' => True, 'nbagni' => 2, 'terrazzo' => True, 'superficie' => 120, 'offerta_id' => 1],
            ['loc_ricr' => false, 'npostiletto' => 1, 'ncamere' => 1, 'cucina' => True, 'nbagni' => 2, 'terrazzo' => True, 'superficie' => 110, 'offerta_id' => 3],
            ['loc_ricr' => true, 'npostiletto' => 2, 'ncamere' => 3, 'cucina' => True, 'nbagni' => 1, 'terrazzo' => FALSE, 'superficie' => 90, 'offerta_id' => 4]
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

        ]);
    }
}
