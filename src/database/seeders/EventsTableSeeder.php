<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            [
                'id' => 1,
                'name' => '入園式',
                'content' => '入園式は新年度の、一番最初に行う行事です。保育園に新しく入園する子ども達を迎え入れます。4月に入園する子ども達にとって、家族以外の人たちと長い時間過ごす経験がいよいよ始まる日です。子どもだけでなくその保護者も緊張や不安のなか、新しい生活への期待感を高めることができるでしょう。'
            ],
            [
                'id' => 2,
                'name' => '誕生会',
                'content' => '誕生会は毎月行われ、月ごとに誕生月の子ども達をお祝いする会です。
                全園児がホールなどに集まってお祝いする場合や、学年ごとクラスごとに行うなど様々。
                
                自分の成長やお友だちの成長を、喜び分かち合える機会となっています。園によっては誕生児の保護者が参加する場合や、みんなで歌をうたったり、ゲームをしたり、お楽しみ会のように開催することも。'
            ],
            [
                'id' => 3,
                'name' => '親子遠足',
                'content' => '親子遠足は、入園や進級後、子ども達やクラス全体が落ち着いてくる5月頃に行われることが多いです。
                親子遠足のねらいは、「親子の思い出作りと、保護者同士の交流の場の提供」。
                
                子ども達は、自然とも触れ合える環境で過ごすとともに、 公共の場でのマナーやルール学べるので、成長できる大切な機会と言えます。
                
                また、保護者の方も、子ども同士が仲良しだと、「〇〇ちゃんとお弁当一緒に食べたい」といったきっかけから、保護者同士が自然と交流するようになります。'
            ],
            [
                'id' => 4,
                'name' => '運動会',
                'content' => '園の一大イベントのひとつである運動会。

                乳児クラス（0歳～2歳）は保護者と一緒に参加するプログラムがメインで、「ハイハイ競争」や曲に合わせてダンスなど、親子でのふれあいを楽しみます。 泣いたり笑ったり、乳児クラスならではの可愛らしい様子が見られるので、会場全体がほっこり笑顔に。
                
                幼児クラス（3歳～5歳）になると、かけっこや玉入れなどの競技に加え、各学年の集団演技も披露されます。 
                
                年少・年中クラスはダンスやパラバルーン。年長クラスは鼓笛隊がメジャーでしょう。 そんな練習の集大成である運動会では、保護者や保育士さんが感動で涙する場面も。
                
                運動会は観覧する保護者や関係者の人数も多く、いつもと違う環境に驚いてしまう子どももいます。そのため、練習では出来ていたような競技や演技が出来ないことも。しかし、運動会を行うねらいは、子どもたちが練習の成果を披露する楽しさ、友達と協力して目標へ向かう達成感を知ってもらうことです。
                
                様々なルールや決まり事を覚えたり、頑張る友達を応援したり、様々なプロセスを経験することで、子ども達は一回りも二回りも大きく成長することでしょう'
            ],
            [
                'id' => 5,
                'name' => '生活発表会',
                'content' => '生活発表会は、1年間の集大成を披露する場です。

                「劇・劇ごっこ」「器楽合奏」「お遊戯」など、園によって演目は様々！出し物によって生活発表会・お遊戯会・音楽発表会と名称も異なるでしょう。 11月～12月頃から活動を保育に取り入れたり、少しづつ練習を始めていきます。
                
                子ども達は活動の中で表現力や想像力・協調性が養われ、「今までの練習の成果を、みんあで力を合わせて出し切る」そんな思いで一致団結するのです。
                
                楽しみながらも緊張感を持って披露する空間の中で、保護者や保育士さんも子ども達の成長をともに喜ぶことが出来るでしょう。'
            ],
            [
                'id' => 6,
                'name' => 'お別れ会',
                'content' => '卒園を控えた年長児のお別れ会で、卒園式前後に開催されます。

                お友だちや保育士さんとの別れも感じつつ、小学生になる期待に胸を躍らせている子ども達。全園児が参加するお別れ会では、在園児から歌や製作のプレゼントが贈られます。在園児にとっても、「 もうすぐ新しいクラスになってお兄ちゃん・お姉ちゃんになる！」といった期待が実感できることでしょう。
                
                保護者参加型のお別れ会では、お菓子パーティーをしながら談笑したりゲームをしたりすることが多いようです。保育士さん・保護者にとっても、嬉しいけれど寂しい気持ちになるかもしれません。 子ども達が期待を持って小学生になれるような言葉がけや、これまでの感謝を伝えてみるのもいいでしょう。'
            ],
        ]);
    }
}