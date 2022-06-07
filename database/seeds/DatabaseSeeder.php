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
            ['data_nascita' => '2005-08-10','nome' => 'adminNome', 'cognome' => 'adminCognome', 'username' => 'adminadmin', 'password' => Hash::make('adminadmin'), 'tipologia' => 'a', 'sesso' => 'F', 'telefono' => '5235656498',],
            ['data_nascita' => '1995-08-10','nome' => 'lario', 'cognome' => 'lario', 'username' => 'lariolario', 'password' => Hash::make('lariolario'), 'tipologia' => 's', 'sesso' => 'F', 'telefono' => '5235656498',],
            ['data_nascita' => '2005-08-10','nome' => 'lore', 'cognome' => 'lore', 'username' => 'lorelore', 'password' => Hash::make('lorelore'), 'tipologia' => 'l', 'sesso' => 'F', 'telefono' => '5235656498',]   
        ]);

        DB::table('offerta')->insert([
            ['via' => 'via dei martiri', 'ncivico' => 5, 'genereRichiesto' => 'A', 'citta' => 'Genova', 'descrizione' => 'Appartamento per studenti universitari e non, per favore astenersi perditempo', 'dataInizioLocazione' => '2022-08-08', 'titolo' => 'Appartamento a Genova', 'tipologia' => 'A', 'prezzo' => 100, 'dataPubblicazione' => '2022-06-07', 'etaRichiesta' => 18, 'user_id' => 3],

            ['via' => 'via dei matti', 'ncivico' => 17, 'genereRichiesto' => 'A', 'citta' => 'Ancona', 'descrizione' => 'Appartamento per studenti universitari e non, per favore astenersi perditempo', 'dataInizioLocazione' => '2022-07-10', 'titolo' => 'Appartamento ad Ancona per lavoratori', 'tipologia' => 'A', 'prezzo' => 700, 'dataPubblicazione' => '2022-06-07', 'etaRichiesta' => 25, 'user_id' => 3],

            ['via' => 'via dei pazzi', 'ncivico' => 22, 'genereRichiesto' => 'M', 'citta' => 'Roma', 'descrizione' => 'Appartamento per studenti universitari e non, per favore astenersi perditempo', 'dataInizioLocazione' => '2022-06-18', 'titolo' => 'Appartamento a Roma offertissima', 'tipologia' => 'A', 'prezzo' => 2000, 'dataPubblicazione' => '2022-06-07', 'etaRichiesta' => 18, 'user_id' => 3],

            ['via' => 'via degli infuriati', 'ncivico' => 32, 'genereRichiesto' => 'A', 'citta' => 'Roma', 'descrizione' => 'Appartamento per studenti universitari e non, per favore astenersi perditempo', 'dataInizioLocazione' => '2022-12-08', 'titolo' => 'Posto letto per studenti a Roma', 'tipologia' => 'P', 'prezzo' => 300, 'dataPubblicazione' => '2022-06-07', 'etaRichiesta' => 18, 'user_id' => 3],

            ['via' => 'via dei belli', 'ncivico' => 67, 'genereRichiesto' => 'F', 'citta' => 'Ancona', 'descrizione' => 'Appartamento per studenti universitari e non, per favore astenersi perditempo', 'dataInizioLocazione' => '2023-05-08', 'titolo' => 'Posto letto per studentesse universitari', 'tipologia' => 'P', 'prezzo' => 500, 'dataPubblicazione' => '2022-06-07', 'etaRichiesta' => 20, 'user_id' => 3],

            ['via' => 'via dei pigri', 'ncivico' => 86, 'genereRichiesto' => 'M', 'citta' => 'Milano', 'descrizione' => 'Appartamento per studenti universitari e non, per favore astenersi perditempo', 'dataInizioLocazione' => '2022-06-06', 'titolo' => 'Appartamento a Torino centro', 'tipologia' => 'A', 'prezzo' => 900, 'dataPubblicazione' => '2022-06-07', 'etaRichiesta' => 21, 'user_id' => 3],

            ['via' => 'via dei santi', 'ncivico' => 49, 'genereRichiesto' => 'F', 'citta' => 'Torino', 'descrizione' => 'Appartamento per studenti universitari e non, per favore astenersi perditempo', 'dataInizioLocazione' => '2024-08-08', 'titolo' => 'Posto letto per studentesse', 'tipologia' => 'P', 'prezzo' => 1500, 'dataPubblicazione' => '2022-06-07', 'etaRichiesta' => 18, 'user_id' => 3],

            ]);

        DB::table('posto_letto')->insert([
            ['doppia' => true, 'luogoStudio' => true, 'finestra' => false, 'superficie_postoletto' => 7, 'offerta_id' => 4],
            ['doppia' => false, 'luogoStudio' => true, 'finestra' => true, 'superficie_postoletto' => 15, 'offerta_id' => 5],
            ['doppia' => false, 'luogoStudio' => true, 'finestra' => false, 'superficie_postoletto' => 10, 'offerta_id' => 7],           
        ]);

        DB::table('appartamento')->insert([
            ['loc_ricr' => true, 'npostiletto' => 2, 'ncamere' => 3, 'cucina' => True, 'nbagni' => 2, 'terrazzo' => True, 'superficie' => 120, 'offerta_id' => 1],
            ['loc_ricr' => false, 'npostiletto' => 1, 'ncamere' => 1, 'cucina' => True, 'nbagni' => 2, 'terrazzo' => True, 'superficie' => 110, 'offerta_id' => 2],
            ['loc_ricr' => true, 'npostiletto' => 2, 'ncamere' => 3, 'cucina' => false, 'nbagni' => 3, 'terrazzo' => true, 'superficie' => 90, 'offerta_id' => 3],
            ['loc_ricr' => false, 'npostiletto' => 2, 'ncamere' => 3, 'cucina' => True, 'nbagni' => 1, 'terrazzo' => false, 'superficie' => 90, 'offerta_id' => 6]
        ]);
        DB::table('faq')->insert([
            ['domanda' => 'è gratis?','risposta'=> 'Certo!!! la nostra non è un\' organizzazione a scopo di lucro. '],
            ['domanda' => 'Come posso registrarmi?','risposta'=> 'è semplicissimo!!! basta cliccare sul bottone di registrazione nella sezione accedi'],
            ['domanda' => 'Che dati devo inserire per la registrazione?','risposta'=> 'Sia nel caso di un utente locatore che nel caso di un utente studente bisogna inserire: nome, cognome, data di nascita, sesso, username e password'],
            ['domanda' => 'Come posso contattari i proprietari?','risposta'=> 'Una volta registrato potrai utilizzare il sistema di messagistica interna al sito']
        ]);

        DB::table('fotos')->insert([
            ['nome_file' => 'test-image-1.jpg','offerta_id'=> '1',],
            ['nome_file' => 'test-image-2.jpg','offerta_id'=> '1',],
            ['nome_file' => 'test-image-3.jpg','offerta_id'=> '1',],

            ['nome_file' => 'app-1-2.jpg','offerta_id'=> '2',],
            ['nome_file' => 'app-2-2.jpg','offerta_id'=> '2',],
            ['nome_file' => 'app-3-2.jpg','offerta_id'=> '2',],

            ['nome_file' => 'pl-4.jpg','offerta_id'=> '4',],
            ['nome_file' => 'pl-5.jpg','offerta_id'=> '5',],
            ['nome_file' => 'pl-7.jpg','offerta_id'=> '7',],
        

            ['nome_file' => 'app-1-3.jpg','offerta_id'=> '3',],
            ['nome_file' => 'app-2-3.jpg','offerta_id'=> '3',],
            ['nome_file' => 'app-3-o3.jpg','offerta_id'=> '3',],

            ['nome_file' => 'missing_foto.jpg','offerta_id'=> '6',],
            ['nome_file' => 'missing_foto.jpg','offerta_id'=> '6',],
        ]);

        DB::table('opzionamento')->insert([

        ]);

        DB::table('contratto')->insert([
        
        ]);

        DB::table('messaggio')->insert([
            
        ]);

        DB::table('chat')->insert([
            
        ]);
    }
}
