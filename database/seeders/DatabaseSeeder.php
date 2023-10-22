<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Lead;
use App\Models\Offer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Админ',
                'tech_name' => 'admin'
            ],
            [
                'name' => 'Вебмастер',
                'tech_name' => 'webmaster'
            ],
            [
                'name' => 'Рекламодатель',
                'tech_name' => 'advertiser'
            ],
            [
                'name' => 'Оператор',
                'tech_name' => 'operator'
            ]
        ];

        foreach ($roles as $role){
            Role::create($role);
        }

        $users = [
            [
                'name' => 'Иван',
                'email' => 'admin@email.net',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role_id' => Role::where('tech_name', 'admin')->pluck('id')->first(),
                'confirmed' => true
            ],
            [
                'name' => 'Сергей',
                'email' => 'master@email.net',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role_id' => Role::where('tech_name', 'webmaster')->pluck('id')->first(),
                'balance' => 7000,
                'confirmed' => true
            ],
            [
                'name' => 'Алексей',
                'email' => 'adv@email.net',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role_id' => Role::where('tech_name', 'advertiser')->pluck('id')->first(),
                'confirmed' => true
            ],
            [
                'name' => 'Кристина',
                'email' => 'operator@email.net',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role_id' => Role::where('tech_name', 'operator')->pluck('id')->first(),
                'confirmed' => true
            ]
        ];

        foreach ($users as $user){
            User::create($user);
        }

        $offers = [
            [
                'name' => 'TINKOFF MOBILE',
                'description' => '
                Тинькофф Мобайл – это виртуальный мобильный оператор. Здесь нет тарифов в привычном понимании. Клиент может самостоятельно собрать подходящий тариф: пакет минут, пакет Гбайт или безлимитный доступ к сервисам. Клиентская база
                ',
                'target' => 'Оплаченный заказ',
                'price' => '450',
                'advertiser_id' => 3
            ],
            [
                'name' => 'TINKOFF( КРЕДИТНЫЕ КАРТЫ)',
                'description' => 'После достижения объёмов трафика в 10 лидов советуем новым веб-мастерам оффера остановить трафик и дождаться сверки.
Получение карты клиентом:
Заявка на сайте (Клиент заполняет заявку на сайте. Для этого ему потребуется только паспорт!)
Решение банка (Мы сообщим о решении за 2 минуты. Если потребуется что-то уточнить, сотрудники банка позвонят в течении пары минут)
Доставка карты (Сотрудник банка доставит карту и документы домой или на работу в удобное время)
Активация происходит за пару кликов с помощью:
Пополнение через сеть партнеров банка по всей России без комиссии
Бесплатный интернет-банк
Бесплатный мобильный банк
Оплата веб-мастеру производится только за выданную карту, по которой совершена покупка.
Гео: Россия, кроме Республики Крым
Минус-слова
Лицензия ЦБ РФ
Запрет трафика из Instagram* и Facebook*. *Организация, запрещённая на территории России',
                'target' => 'Оплаченный заказ',
                'price' => '1231',
                'advertiser_id' => 3
            ]
        ];

        $for_partner = json_encode([
            'Работа с крупной компанией',
            'Известный бренд',
            'Прозрачные условия работы',
            'Конкурентная комиссия в сегменте',
            'Широкий геотаргетинг',
            'Постоянное улучшение сайта с целью увеличения конверсии и наличие мобильного приложения',
            'Высокая маркетинговая активность, частые акции',
            'Регулярное обновление промо-материалов',
            'Своевременные выплаты'
        ]);
        $for_client = json_encode([
            'Возможность собрать тариф под себя для любых целей',
            'Безлимит на мессенджеры, соц.сети, видео-конференции, музыку, видео и СМС',
            'Сим-карта без пластика e-Sim',
            'Секретарь Олег – защита от спама и мошенников',
            'Определитель номера',
            'Круглосуточная поддержка в приложении и по телефону',
            'Возможность переноса своего номера',
            'Красивые номера',
            'Возможность записи звонков',
            'Возможность сменить название оператора',
            'Постоянные акции и специальные предложения',
            'Доставка сим-карты по всей России представителем'
        ]);
        $distinctive = json_encode([
            'Широкое ГЕО работы мастеров',
            'Выезд  до 30 км от города',
            'Промо-прайс с ценами'
        ]);
        $hold = '24 часа';
        $vector = 'Банки';

        foreach ($offers as $offer){
            $offer['for_partner'] = $for_partner;
            $offer['for_client'] = $for_client;
            $offer['distinctive'] = $distinctive;
            $offer['hold'] = $hold;
            $offer['vector'] = $vector;

            $offer['except'] = 'Тинькофф Мобайл – это виртуальный мобильный оператор. Здесь нет тарифов в привычном понимании. Клиент может самостоятельно собрать подходящий тариф';
            Offer::create($offer);
        }

        $leads = [
            '7(999)888-77-66',
            '7(111)222-33-44',
            '7(999)777-77-11',
            '7(999)321-32-23'
        ];

        $statuses = ['hold', 'cancel', 'accept'];

        foreach ($leads as $lead) {
            Lead::create([
                'offer_id' => rand(1,2),
                'status' => $statuses[rand(0,2)],
                'master_id' => User::where('email', 'master@email.net')->pluck('id')->first(),
                'phone' => $lead
            ]);
        }
    }
}
