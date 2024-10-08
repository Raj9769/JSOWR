<?php

namespace App\Console\Commands;

use App\Models\Client;
use App\Models\Event;
use App\Models\Participant;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AutNotifi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'aut:notifi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::today()->addDays(2)->toDateString();
        $eventlist = Event::get();
        foreach ($eventlist as $event) {
            $date2 = Carbon::parse($event->date)->toDateString();
            if ($today == $date2) {
                $participants = Participant::where('events_id', $event->id)->get();
                foreach ($participants as $participant) {
                    $client = Client::where('id', $participant->clients_id)->first();
                    $mchm['mail_subject'] = 'Reminding Mail';
                    $mchm['to_name'] = $client->name;
                    $mchm['from'] = config('constant.SUPPORT_MAIL');
                    $mchm['name'] = config('constant.NAME');
                    $mchm['email'] = $client->email;
                    $mchm['date'] = $event->date;

                    \Mail::to($mchm['email'])->send(new \App\Mail\SendMail($mchm));
                }

                // \Mail::to('trivediraj4@gmail.com')->send(new \App\Mail\SendMail($details));
            } else {
                continue;
            }
        }
    }
}
