class Video_Info
{
    public $ffprobe   = "/usr/local/bin/ffprobe";
    public $option    = array('default'=>'-v quiet -show_format -print_format json');
    public $file      = '';
    public $json_data = '';
    public $command   = '';


    private function __construct($file)
    {
        $this->file = $file;
    }

    public static function create($file)
    {
        return new Video_Info($file);
    }


    public function options($param,$key='arg')
    {
        if (!empty($param)) {
            $this->option[$key][] = ' '.$param;
            return $this;
        }
    }

    public function get_options($key='arg')
    {
        if (!empty($this->option[$key])) {
            foreach($this->option[$key] as $k => $v) {
               if (!isset($cmd)) {
                   $cmd = $v;
               } else {
                   $cmd .= $v;
               }
            }
        } else{
            $cmd = $this->option['default'];
        }
    return $cmd;

    }

    public function video()
    {
        if (file_exists($this->file))
        {
            $this->command = sprintf('%s %s %s',$this->ffprobe, $this->get_options(), escapeshellarg($this->file));
            $this->json_data = shell_exec($this->command);
            if (!empty($this->json_data))
            {
                $this->json_data = json_decode($this->json_data, true);
            } else
            {
                throw new Exception('('.$this->command.') komut bulunamadi.');
            }

        } else
        {
            throw new Exception('('.$this->file.') Dosya bulunamadi.');
        }
        return $this->json_data;
    }


}
