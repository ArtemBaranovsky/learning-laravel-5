@extends('app')

@section('content')
{{--    @if($first == 'Artem')
        <h1>--}}{{--About Me:--}}{{-- Hi {{$first}} --}}{{--{{ $last }}--}}{{--</h1>
    @else
        <h1>Else</h1>
    @endif--}}
    <h1>About</h1>

    @if(count($people))
        <h3>People I Like:</h3>
        <ul>
            @foreach($people as $person)
                <li>{{$person}}</li>
            @endforeach
        </ul>
    @endif

        <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid blanditiis dignissimos distinctio hic maxime non possimus quidem sit ullam voluptatem! Autem blanditiis deserunt eum officia quas quis voluptas voluptate voluptatibus?</span><span>Amet, commodi dolor, doloremque dolores dolorum eaque et illum itaque nisi numquam perferendis placeat recusandae repellendus reprehenderit unde! A asperiores cum dignissimos eaque magnam omnis quae quia tempore tenetur ullam.</span><span>Consequatur dolores maxime minima minus non omnis porro quod sequi voluptate, voluptates. Natus, rem voluptate? Assumenda, hic, laborum! Atque dolor dolorem ducimus error ex molestiae nesciunt pariatur quidem veritatis voluptatem?</span><span>Aliquam consequuntur eligendi fugiat, ipsum itaque laborum laudantium magnam nostrum qui, recusandae reprehenderit similique temporibus, totam. Aliquam, dignissimos dolores eaque, eligendi ex facere libero magni odio reprehenderit sint vel voluptatum.</span><span>Accusamus cupiditate dolores voluptatibus voluptatum! Aliquam debitis eaque eligendi fugiat, neque perspiciatis possimus provident quam, quod, recusandae totam voluptatem? Autem dolore ipsam laudantium minima modi odio odit quam quisquam soluta?</span><span>A ab ad animi asperiores atque, aut consequuntur delectus, dicta dignissimos distinctio dolorem error et, eum exercitationem laborum libero magnam magni nam natus obcaecati provident quas reiciendis sint unde ut.</span><span>Ad aut, autem ea eaque eveniet hic molestiae nulla pariatur quos reiciendis reprehenderit saepe tempora ullam. A ea eaque earum, error excepturi exercitationem id molestiae nemo numquam quasi rem tempora.</span><span>Ad aliquid commodi consequuntur delectus dolorem doloremque doloribus eius eum explicabo inventore ipsum mollitia nesciunt, nulla numquam quis quisquam quod ratione similique tempore, totam. In itaque, molestias. Accusamus, est, neque.</span><span>Assumenda commodi consectetur cupiditate, deleniti dicta dolores eligendi esse eum facere iste, iure nihil omnis perspiciatis quia, quis rerum soluta voluptas voluptates. Asperiores eius esse facilis, numquam omnis quidem reiciendis?</span><span>Eos ex facere fuga hic quae sed, sequi soluta tempora? Alias assumenda consequatur dicta dolor dolores ea eligendi ex iure necessitatibus provident. Amet, nihil odit quasi similique totam velit vero.</span><span>A alias aliquam amet, blanditiis culpa cum cumque debitis delectus dolorum ducimus eum fuga ipsum itaque laborum non nulla officiis repellat repellendus tenetur voluptate. Aliquid deleniti eligendi necessitatibus praesentium veritatis?</span><span>Adipisci autem, culpa eaque eos error fuga id magni, necessitatibus, nihil pariatur perspiciatis provident quasi quos sunt tempore voluptas voluptates. Dolores earum explicabo in necessitatibus nobis omnis recusandae rerum vero.</span><span>Amet dolor eligendi impedit non quaerat quam quod tempore. Aut corporis cumque debitis distinctio dolores dolorum harum incidunt laudantium nam pariatur quas quisquam repellendus, sequi similique sint, soluta unde, veniam.</span><span>Consequatur est iste odio odit? Architecto aut blanditiis culpa deserunt dicta eaque eveniet ipsum iusto labore laudantium nam neque qui reprehenderit saepe ullam, veritatis, voluptate voluptates. Eum illum minus numquam?</span><span>Eaque quam quos rem sit. Atque corporis, deserunt distinctio illum inventore ipsum mollitia, nam odit perferendis quam repellat voluptatum! Adipisci aliquam aut, consequatur cumque magni officiis quis ut! Quae, temporibus.</span><span>Accusamus accusantium amet blanditiis cum cumque dolor, ea eligendi et facilis in ipsam ipsum libero, minus nostrum numquam omnis optio praesentium quae quaerat quisquam quo rem sit, voluptatem! Maxime, perspiciatis.</span><span>Adipisci alias assumenda enim eos excepturi id iste laudantium maiores mollitia non obcaecati, porro quasi quia ratione rem repellendus sit soluta temporibus! Adipisci eligendi ex fugiat impedit possimus sequi voluptas.</span><span>Aperiam architecto aspernatur assumenda cumque distinctio dolor dolore dolorem dolorum eligendi enim eos esse facere incidunt ipsa neque odit officia possimus quaerat quam, quas quasi rem sunt totam vitae voluptatibus?</span><span>Accusamus ad aliquam cum deleniti dolore doloremque dolores ea esse eveniet exercitationem fugiat hic in iusto labore laborum, magni nostrum quae quia quidem repellendus sint sit, sunt suscipit tempore vel?</span><span>At atque consectetur culpa cumque ea eius nobis quas repellat? Dignissimos, doloremque facere ipsum optio repellat rerum vitae voluptas. Alias distinctio ea eligendi est et, id modi praesentium similique suscipit!</span>
        </p>
@stop