<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;
use App\Models\Event;
use App\Models\EventDate;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{

	/**
     * @param integer|null $year
     * @param integer|null $month
     * @return View
     */
    public function get(int $year = null, int $month = null): View
    {
        $weeks = ['日', '月', '火', '水', '木', '金', '土'];

        $carbon = new Carbon();
        $carbon->locale('ja_JP');

        if ($year) {
            $carbon->setYear($year);
        }
        if ($month) {
            $carbon->setMonth($month);
        }
        $carbon->setDay(1);
        $carbon->setTime(0, 0);

        $firstDayOfMonth = $carbon->copy()->firstOfMonth();
        $lastOfMonth = $carbon->copy()->lastOfMonth();

        $firstDayOfCalendar = $firstDayOfMonth->copy()->startOfWeek();
        $endDayOfCalendar = $lastOfMonth->copy()->endOfWeek();

        $dates = [];
        while ($firstDayOfCalendar < $endDayOfCalendar) {
            $dates[] = $firstDayOfCalendar->copy();
            $firstDayOfCalendar->addDay();
        }

        $event_dates = EventDate::all(); 

        $event_lists = Event::all();

        return view('teacher.event', compact(
            'weeks',
            'dates', 
            'firstDayOfMonth',
            'event_dates',
            'event_lists'
        ));
    }

    public function add(Request $request, $id)
    {
        $eventdate = EventDate::create([
            'event_id' => $request->event_id,
            'date' => $id
        ]);

        return redirect()
            ->route('teacher.event');
    }

    public function delete($id)
    {
        $event_delete = EventDate::find($id);

        $event_delete->delete();

        return redirect()
            ->route('teacher.event')
            ->withStatus("削除しました");
    }

    public function create(EventRequest $request)
    {
        Event::create([
            'name' => $request->name,
            'content' => $request->content
        ]);

        return redirect()
            ->route('teacher.event')
            ->withStatus("登録しました");;
    }

    public function update(EventRequest $request, $id)
    {
        $event_update = Event::find($id);

        $event_update['name'] = $request['name'];
        $event_update['content'] = $request['content'];

        $event_update->save();

        return redirect()
            ->route('teacher.event')
            ->withStatus("更新しました");
    }

    public function create_delete($id)
    {
        $event_delete = Event::find($id);

        $event_delete->delete();

        return redirect()
            ->route('teacher.event')
            ->withStatus("削除しました");
    }

    public function event_detail($id)
    {
        $event = Event::find($id);

        return view('event_detail',compact(
            'event'
        ));
    }
}