<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $images = [
            'https://i.pinimg.com/564x/f5/1b/71/f51b71c5050e2f73c2d58fb5d384bd4d.jpg',
            'https://i.pinimg.com/564x/bc/f0/af/bcf0afaf97e7d7e7182c50614f6512d0.jpg',
            'https://i.pinimg.com/564x/84/5f/c8/845fc8c9906fd49dbbcf3f3632170ab2.jpg',
            'https://i.pinimg.com/564x/b8/32/ea/b832ea7b638f5fc80a640229de340ffc.jpg',
            'https://i.pinimg.com/564x/5b/8e/0c/5b8e0c970692323191a641b3e904e553.jpg',
            'https://i.pinimg.com/564x/48/79/72/487972c5fbb09317fc0a61cb4457a9fb.jpg',
            'https://i.pinimg.com/564x/c8/6d/e9/c86de9fef5e250e328a3940fbe0ee19d.jpg',
            'https://i.pinimg.com/564x/20/65/70/206570e20a6094e991e5ff0edb47c81a.jpg',
            'https://i.pinimg.com/564x/01/7f/e4/017fe4f78063730f3065bdbd093c4b8f.jpg',
            'https://i.pinimg.com/564x/bc/f0/af/bcf0afaf97e7d7e7182c50614f6512d0.jpg',
            'https://awsimages.detik.net.id/community/media/visual/2020/02/25/3b0eff5f-a1a2-4969-9ef5-006e3d886d07.jpeg',
            'https://static.tripzilla.com/thumb/d/9/73689_700x.jpg',
            'https://jejakpiknik.com/wp-content/uploads/2021/03/pemandangan-gunung-di-cirebon.jpg',
            'https://httpbigdayamuliatrans.files.wordpress.com/2017/10/78ciremai446754427.jpg',
            'https://www.yukpiknik.com/wp-content/uploads/2015/12/WP_20140512-4.jpg',
            'https://cdn.rentalmobilbali.net/wp-content/uploads/2019/05/Mendaki-Gunung-Batur-Kintamani.jpg',
            'https://asset.kompas.com/crops/SoV9Gbjt5lPyauSVwNduptwNjZk=/0x0:780x520/750x500/data/photo/2019/06/18/2282931801.jpg',
            'http://www.adventuretravel.co.id/uploads/9/8/4/1/98413240/published/531522843.jpg?1490708475',
            'https://cdn.idntimes.com/content-images/community/2019/09/main-900-d62d731a3c3fe36de95cda4be4427e69_600x400.jpg',
            'https://cdn-image.hipwee.com/wp-content/uploads/2019/09/hipwee-4-4.jpg',
            'https://cdn.idntimes.com/content-images/post/20180713/82258cecfdae1445e8f7ff8c8229107a.jpg',
            'https://www.indonesia.go.id/assets/upload/headline//1546940840_gunung_krakatau_624x351.jpg',
        ];

        return [
            'title' => $this->faker->sentence(rand(6, 15)),
            'description' => $this->faker->paragraph(rand(2, 5)),
            'thumbnail' => $images[rand(0, count($images) - 1)],
        ];
    }
}
