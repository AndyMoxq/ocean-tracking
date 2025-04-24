<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ydn_tracking_carriers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name_cn')->nullable()->comment('中文简称');
            $table->string('name_en')->nullable()->comment('英文简称');
            $table->text('remark')->nullable()->comment('备注');
            $table->timestamps();
        });

        DB::table('ydn_tracking_carriers')->insert([
            ['code' => 'ACI', 'name_cn' => '亚利安莎', 'name_en' => 'ALIANCA', 'remark' => '订阅时，使用MSK代码来订阅'],
            ['code' => 'ACL', 'name_cn' => '大西洋', 'name_en' => 'ATLANTIC CONTAIER LINE', 'remark' => null],
            ['code' => 'APL', 'name_cn' => '美国总统', 'name_en' => 'AMERICAN PRESIDENT', 'remark' => null],
            ['code' => 'ATL', 'name_cn' => '安通物流', 'name_en' => 'QUANZHOU ANTONG LOGISTICS CO.,LTD.', 'remark' => null],
            ['code' => 'CCNI', 'name_cn' => '南美智利', 'name_en' => 'COMPANIA CHILENA DE', 'remark' => '订阅时，使用MSK代码来订阅'],
            ['code' => 'CKL', 'name_cn' => '天敬', 'name_en' => 'CK LINES', 'remark' => null],
            ['code' => 'CMA', 'name_cn' => '法国达飞', 'name_en' => 'CMA & CGM', 'remark' => null],
            ['code' => 'CNC', 'name_cn' => '正利', 'name_en' => 'CHENG LIE', 'remark' => null],
            ['code' => 'COSCO', 'name_cn' => '中远海', 'name_en' => 'COSCO', 'remark' => null],
            ['code' => 'CUL', 'name_cn' => '中联航运', 'name_en' => 'CHINA UNITED LINES', 'remark' => null],
            ['code' => 'DEL', 'name_cn' => '达贸轮船', 'name_en' => 'DELMAS', 'remark' => null],
            ['code' => 'DYS', 'name_cn' => '东暎', 'name_en' => 'Dong Young Shipping', 'remark' => null],
            ['code' => 'EMC', 'name_cn' => '长荣海运', 'name_en' => 'EVERGREEN', 'remark' => null],
            ['code' => 'ESL', 'name_cn' => '阿联酋航运', 'name_en' => 'EMIRATES LINE', 'remark' => null],
            ['code' => 'GSL', 'name_cn' => '金星轮船', 'name_en' => 'GOLD STAR', 'remark' => null],
            ['code' => 'HAL', 'name_cn' => '兴亚', 'name_en' => 'HEUNG-A', 'remark' => null],
            ['code' => 'HBS', 'name_cn' => '汉堡南美', 'name_en' => 'HAMBURG SUD', 'remark' => '订阅时，使用MSK代码来订阅'],
            ['code' => 'HEDEHK', 'name_cn' => '合德航运', 'name_en' => 'HEDEHK', 'remark' => null],
            ['code' => 'HMM', 'name_cn' => '现代', 'name_en' => 'HYUNDAI', 'remark' => null],
            ['code' => 'HPL', 'name_cn' => '赫伯罗特', 'name_en' => 'HAPAG-LLOYD', 'remark' => '出口提单订阅时，最好将目的地名称一起上传上来，方便我们映射目的港的抵达、提货动态'],
            ['code' => 'JINJIANG', 'name_cn' => '锦江航运', 'name_en' => 'JINJIANG SHIPPING', 'remark' => '仅支持提单号订阅'],
            ['code' => 'IAL', 'name_cn' => '运达', 'name_en' => 'INTERASIA LIN', 'remark' => null],
            ['code' => 'KKC', 'name_cn' => '神原汽船', 'name_en' => 'KAMBARA KISEN', 'remark' => null],
            ['code' => 'KMTC', 'name_cn' => '高丽', 'name_en' => 'KOREA MARINE', 'remark' => null],
            ['code' => 'MARI', 'name_cn' => '玛丽亚那', 'name_en' => 'MARIANA', 'remark' => null],
            ['code' => 'MATS', 'name_cn' => '美森轮船', 'name_en' => 'MATSON', 'remark' => null],
            ['code' => 'MCC', 'name_cn' => '穆勒航运', 'name_en' => 'MERCANTILE', 'remark' => null],
            ['code' => 'MSC', 'name_cn' => '地中海航运', 'name_en' => 'MSC', 'remark' => null],
            ['code' => 'MSH', 'name_cn' => '民生轮船', 'name_en' => 'MINSHENG SHIPPING CO. LTD.,MSH', 'remark' => '提单号订阅，无箱动态，箱号订阅数据比较全面'],
            ['code' => 'MSK', 'name_cn' => '马士基', 'name_en' => 'MAERSK', 'remark' => null],
            ['code' => 'NOSCO', 'name_cn' => '宁波远洋', 'name_en' => 'NINGBO OCEAN', 'remark' => '仅支持提单号订阅'],
            ['code' => 'NSS', 'name_cn' => '南星海运', 'name_en' => 'NANSUNG', 'remark' => null],
            ['code' => 'ONE', 'name_cn' => '海洋网联', 'name_en' => 'ONEY', 'remark' => null],
            ['code' => 'OOCL', 'name_cn' => '东方海外', 'name_en' => 'OOCL', 'remark' => null],
            ['code' => 'PCL', 'name_cn' => '泛洲海运', 'name_en' => 'PAN CONTINENTAL SHIPPING', 'remark' => null],
            ['code' => 'PIL', 'name_cn' => '太平', 'name_en' => 'PACIFIC INTERNATIONAL LINES (PTE) LTD', 'remark' => null],
            ['code' => 'SAF', 'name_cn' => '南非轮船', 'name_en' => 'SAFMARINE', 'remark' => null],
            ['code' => 'SIF', 'name_cn' => '仁川国际渡轮', 'name_en' => '', 'remark' => null],
            ['code' => 'SINOKOR', 'name_cn' => '长锦', 'name_en' => 'SINOKOR MERCHANT MARINE', 'remark' => '仅支持提单订阅'],
            ['code' => 'SINO', 'name_cn' => '中外运', 'name_en' => 'SINOTRANS', 'remark' => '可直接箱号订阅，提单订阅时需要提单+其中一个箱号一起订阅'],
            ['code' => 'SITC', 'name_cn' => '新海丰', 'name_en' => 'SITC CONTAINER LINES COMPANY LIMITED', 'remark' => '仅支持提单订阅'],
            ['code' => 'SLS', 'name_cn' => '海领船务', 'name_en' => 'SEA LEADS SHIPPING', 'remark' => '提单号、箱号可查，SO(订舱号)查不了'],
            ['code' => 'SML', 'name_cn' => '森罗', 'name_en' => 'SM LINE', 'remark' => null],
            ['code' => 'STX', 'name_cn' => '世腾船务', 'name_en' => 'STX PAN OCEAN', 'remark' => null],
            ['code' => 'SSL', 'name_cn' => '萨姆达拉', 'name_en' => 'SAMUDERA SHIPPING LINE LTD/MARUBA S.C.A.', 'remark' => null],
            ['code' => 'TJFH', 'name_cn' => '致远航运', 'name_en' => '', 'remark' => null],
            ['code' => 'TSL', 'name_cn' => '德翔海运', 'name_en' => 'T.S.LINES', 'remark' => '提单号、箱号可查，SO(订舱号)查不了'],
            ['code' => 'USL', 'name_cn' => '美国轮船', 'name_en' => 'U.S.LINES', 'remark' => null],
            ['code' => 'WHL', 'name_cn' => '万海', 'name_en' => 'WAN HAI LINES CO.,LTD.', 'remark' => null],
            ['code' => 'YML', 'name_cn' => '阳明', 'name_en' => 'YANG MING', 'remark' => null],
            ['code' => 'ZIM', 'name_cn' => '以星', 'name_en' => 'ZIM INTEGRATED SHIPPING', 'remark' => null],
            ['code' => 'ZSH', 'name_cn' => '中谷海运', 'name_en' => 'ZHONGGU SHIPPING', 'remark' => null],
        ]);


        Schema::create('ydn_tracking_status_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('status')->nullable()->comment('英文简称');
            $table->string('status_cn')->nullable()->comment('中文简称');
            $table->text('remarks')->nullable()->comment('备注');
        });

        DB::table('ydn_tracking_status_codes')->insert([
            ['code'=>'BKCF','status'=>'Booked','status_cn'=>'订舱','remarks'=>null],
            ['code'=>'EPRL','status'=>'Shipping Order Released','status_cn'=>'放空箱','remarks'=>null],
            ['code'=>'STSP','status'=>'Empty Pickup','status_cn'=>'提空箱','remarks'=>null],
            ['code'=>'FDLB','status'=>'Feeder Vessel Loaded on board','status_cn'=>'支线装船','remarks'=>null],
            ['code'=>'FDDP','status'=>'Feeder Deprtured','status_cn'=>'支线开航','remarks'=>null],
            ['code'=>'FDBA','status'=>'Feeder Arrived','status_cn'=>'支线抵港','remarks'=>null],
            ['code'=>'FDDC','status'=>'Discharged from Feeder','status_cn'=>'支线卸船','remarks'=>null],
            ['code'=>'CGGI','status'=>'Cargo Loaded','status_cn'=>'装箱','remarks'=>null],
            ['code'=>'CLOD','status'=>'Container Sealed','status_cn'=>'封箱','remarks'=>null],
            ['code'=>'FCGI','status'=>'Full Returned to External Yard','status_cn'=>'返场','remarks'=>null],
            ['code'=>'CYTC','status'=>'Gate In to Outbound Terminal from Yard','status_cn'=>'集港','remarks'=>null],
            ['code'=>'GITM','status'=>'Gate In to Outbound Terminal','status_cn'=>'码头进场','remarks'=>null],
            ['code'=>'PASS','status'=>'Customs Release','status_cn'=>'海关放行','remarks'=>'出口业务：需要船东+起运港一起上传订阅，进口业务：需要船东+目的港一起上传订阅'],
            ['code'=>'CUIP','status'=>'Customs Inspection','status_cn'=>'查验','remarks'=>'出口业务：需要船东+起运港一起上传订阅，进口业务：需要船东+目的港一起上传订阅'],
            ['code'=>'SUOT','status'=>'Outbound Customs Shut Out','status_cn'=>'退关','remarks'=>'出口业务：需要船东+起运港一起上传订阅，进口业务：需要船东+目的港一起上传订阅'],
            ['code'=>'TMPS','status'=>'Terminal Release','status_cn'=>'码头放行','remarks'=>'出口业务：需要船东+起运港一起上传订阅，进口业务：需要船东+目的港一起上传订阅'],
            ['code'=>'TMUT','status'=>'Outbound Terminal Cancelled Loading','status_cn'=>'码头退载','remarks'=>'出口业务：需要船东+起运港一起上传订阅，进口业务：需要船东+目的港一起上传订阅'],
            ['code'=>'LOBD','status'=>'Loaded on Board at Port of Loading','status_cn'=>'装船','remarks'=>null],
            ['code'=>'DLPT','status'=>'Departure from Port of Loading','status_cn'=>'离港','remarks'=>null],
            ['code'=>'TSBA','status'=>'Arrived at Transhipment Port','status_cn'=>'中转抵港','remarks'=>null],
            ['code'=>'TSDC','status'=>'Discharged from Transhipment Port','status_cn'=>'中转卸船','remarks'=>null],
            ['code'=>'TRDP','status'=>'TRUCK DEPARTURE','status_cn'=>'卡车离开','remarks'=>null],
            ['code'=>'TRAR','status'=>'TRUCK ARRIVAL','status_cn'=>'卡车抵达','remarks'=>null],
            ['code'=>'TSLB','status'=>'Loaded on Board at Transhipment Port','status_cn'=>'中转装船','remarks'=>null],
            ['code'=>'TSDP','status'=>'Departured from Transhipment Port','status_cn'=>'中转开航','remarks'=>null],
            ['code'=>'BDAR','status'=>'Arrived at Port of Discharge','status_cn'=>'目的港抵港','remarks'=>null],
            ['code'=>'DSCH','status'=>'Discharged at Port of Discharge','status_cn'=>'目的港卸船','remarks'=>null],
            ['code'=>'DGOT','status'=>'GATE OUT FROM PORT OF DISCHARGE','status_cn'=>'目的港码头出场','remarks'=>null],
            ['code'=>'DCRL','status'=>'Destination Customs Released','status_cn'=>'目的港海关放行','remarks'=>null],
            ['code'=>'IRLB','status'=>'Loaded on Rail at Inbound Rail Origin','status_cn'=>'进口铁运装箱','remarks'=>null],
            ['code'=>'IRDP','status'=>'Inbound Rail Departured','status_cn'=>'进口铁运发车','remarks'=>null],
            ['code'=>'IRAR','status'=>'Inbound Rail Arrived','status_cn'=>'进口铁运到站','remarks'=>null],
            ['code'=>'IRDS','status'=>'Unloaded From Rail at Inbound Rail Destination','status_cn'=>'进口铁运卸箱','remarks'=>null],
            ['code'=>'PDAR','status'=>'Arrived on Place of Delivery','status_cn'=>'抵达交货地','remarks'=>null],
            ['code'=>'PDDS','status'=>'Discharged on Place of Delivery','status_cn'=>'交货地卸箱','remarks'=>null],
            ['code'=>'CGRL','status'=>'Carrier Cargo Release','status_cn'=>'船东放货','remarks'=>null],
            ['code'=>'CTUP','status'=>'Container Unpacking','status_cn'=>'目的港集装箱拆箱','remarks'=>null],
            ['code'=>'STCS','status'=>'Gate Out from Inbound CY for Delivery to Consignee','status_cn'=>'提重柜/提货','remarks'=>null],
            ['code'=>'RCVE','status'=>'Empty Container Returned','status_cn'=>'还空箱','remarks'=>null],
            ['code'=>'END','status'=>'Tracking Finished','status_cn'=>'结束跟踪','remarks'=>'云当网结束跟踪标志'],
        ]);

        Schema::create('ydn_tracking', function (Blueprint $table) {
            $table->id();
            $table->string('keyid', 36)->unique()->nullable()->comment('云当网业务主键(Yundang Network Business Key)');
            $table->string('localkeyid', 50)->nullable()->comment('订阅时传递的值');
            $table->string('blprefix',6)->nullable()->comment('提单前缀');
            $table->string('blno', 128)->nullable()->comment('船东返回的提单号');
            $table->string('bkgno', 128)->nullable()->comment('船东返回的订舱号');
            $table->string('trfsno', 32)->nullable()->comment('港区返回的提单号');
            $table->string('ctnrno', 11)->nullable()->comment('箱号');
            $table->string('bkgvolumn',128)->nullable()->comment('订舱箱量');
            $table->string('plr', 164)->nullable()->comment('收货地(Place of receipt)');
            $table->string('plrcd', 8)->nullable()->comment('收货地代码(Place code of receipt)');
            $table->string('pol', 164)->nullable()->comment('起运港(Port of departure)');
            $table->string('polcd', 8)->nullable()->comment('起运港代码(Port of departure code)');
            $table->string('dtp', 164)->nullable()->comment('卸货港(Discharge Port)');
            $table->string('dtpcd', 8)->nullable()->comment('卸货港代码(Discharge Port Code)');
            $table->string('pld', 164)->nullable()->comment('交货地(Delivery location)');
            $table->string('pldcd', 8)->nullable()->comment('交货地代码(Delivery location code)');
            $table->dateTime('stsptime')->nullable()->comment('提空时间(Empty time)');
            $table->string('stspplace',164)->nullable()->comment('提空地点(Empty location)');
            $table->dateTime('fcgitime')->nullable()->comment('返场时间(外/拖装)(Return time (external/towing))');
            $table->dateTime('cggitime')->nullable()->comment('入货时间(内/场装)(Delivery time (internal/on-site))');
            $table->dateTime('cloadtime')->nullable()->comment('封箱时间(内/场装)(Sealing time (inside/on site))');
            $table->dateTime('cytctime')->nullable()->comment('集港时间(Port arrival time)');
            $table->dateTime('cytcplace')->nullable()->comment('集港地点(Gathering port location)');
            $table->dateTime('gitmtime')->nullable()->comment('进场时间(Entry time)');
            $table->string('gitmplace',164)->nullable()->comment('进场地点(Entry location)');
            $table->dateTime('passtime')->nullable()->comment('海放时间(Sea release time)');
            $table->string('passplace',164)->nullable()->comment('海放地点(Sea release location)');
            $table->string('ispass',1)->nullable()->comment('海关是否放行（Y=放行；N=未放行；C=退关）'); 
            $table->string('ispreload',1)->nullable()->comment('是否预配（Y=已预配；N=未预配；)');
            $table->dateTime('lobdtime')->nullable()->comment('装船时间(Loading time)');
            $table->string('lobdplace',164)->nullable()->comment('装船地点(Loading location)');
            $table->dateTime('dlpttime')->nullable()->comment('离港（开航）时间(Departure time)'); 
            $table->string('dlptplace',164)->nullable()->comment('离港（开航）地点(Departure location)');
            $table->dateTime('etdpol')->nullable()->comment('预离时间(Pre departure time)');
            $table->dateTime('trsptime')->nullable()->comment('中转时间(Transit time)');
            $table->string('trspplace',164)->nullable()->comment('中转地点(Transfer location)');
            $table->dateTime('etapld')->nullable()->comment('预计到港时间(Estimated time of arrival at the port)');
            $table->dateTime('dschtime')->nullable()->comment('卸船时间(Unloading time)');
            $table->string('dschplace',164)->nullable()->comment('卸船地点(Unloading location)');
            $table->string('terminalpld',164)->nullable()->comment('交货地码头(Delivery port)');
            $table->string('terminaldtp',164)->nullable()->comment('目的港码头(Destination port dock)');
            $table->string('pickupreference',128)->nullable()->comment('提货信息（Firms code等）');
            $table->string('railcode',12)->nullable()->comment('铁路公司代码(Railway company code)');
            $table->string('sealno',12)->nullable()->comment('铅封号(Lead seal number)');
            $table->string('csize',3)->nullable()->comment('尺寸(size)');
            $table->string('ctype',3)->nullable()->comment('箱型(Container type)');
            $table->dateTime('stcstime')->nullable()->comment('提货时间(Delivery time)');
            $table->string('stcsplace',164)->nullable()->comment('提货地点(Delivery location)');
            $table->dateTime('rcvetime')->nullable()->comment('还空时间(Still available time)');
            $table->string('rcveplace',164)->nullable()->comment('还空地点(Still available location)');
            $table->string('currentnode', 20)->nullable()->comment('当前节点代码(Current node code)');
            $table->dateTime('currentnodetime')->nullable()->comment('当前节点时间(Current node time)');
            $table->string('currentnodeplace', 164)->nullable()->comment('当前节点地点(Current node location)');
            $table->string('depotcd',12)->nullable()->comment('云当标准场站代码(Yundang Standard Station Code)');
            $table->string('depot',164)->nullable()->comment('云当标准场站名称(Yundang Standard Station Name)');
            $table->string('terminalcd',12)->nullable()->comment('云当标准码头代码(Yundang Standard Terminal Code)');
            $table->string('terminal',164)->nullable()->comment('云当标准码头名称(Yundang Standard Wharf Name)');
            $table->string('vslname', 64)->nullable()->comment('一程船名(Ship name for the first voyage)');
            $table->string('voy', 32)->nullable()->comment('一程航次(One voyage)');
            $table->string('carriercd', 18)->nullable()->comment('云当标准船东代码(Yundang Standard Shipowner Code)');
            $table->string('carrier', 164)->nullable()->comment('云当标准船东名称(Yundang Standard Shipowner Name)');
            $table->dateTime('updatetime')->nullable()->comment('更新时间');
            $table->dateTime('createtime')->nullable()->comment('订阅时间(Subscription time)');
            $table->string('declarationno',18)->nullable()->comment('报关单号(Customs declaration number)');
            $table->string('referenceno', 32)->nullable()->comment('订阅时上传的单号');
            $table->string('isctnr',2)->nullable()->comment('是否是箱号订阅（0=否;1=是）');
            $table->string('currentvslname',64)->nullable()->comment('当前船名(Current ship name)');
            $table->string('currentvoy',32)->nullable()->comment('当前航次(Current voyage)');
            $table->string('companycd', 8)->nullable()->comment('企业编号(Enterprise ID)');
            $table->dateTime('endtime')->nullable()->comment('结束时间(End time)');
            $table->string('isendforce', 1)->nullable()->comment('是否强制结束（Y=是，N=否）');
            $table->dateTime('tmpstime')->nullable()->comment('码头放行时间(Dock release time)');
            $table->string('istmps', 1)->nullable()->comment('是否码头放行（Y=放行；N=未放行；）');
            $table->dateTime('datatime')->nullable()->comment('第一次获取到数据的时间(The first time data was obtained)');
        });

        Schema::create('ydn_tracking_carriages',function(Blueprint $table){
            $table->id();
            $table->foreignId('ydn_tracking_id')->constrained('ydn_tracking');
            $table->string('vslname',64)->nullable()->comment('船名(Ship name)');
            $table->string('voy',32)->nullable()->comment('航次(Voyage)');
            $table->string('pol',164)->nullable()->comment('起运港(Port of departure)');
            $table->string('pod',164)->nullable()->comment('卸货港(Discharge Port)');
            $table->string('polcd',5)->nullable()->comment('起运港代码(Port of departure code)');
            $table->string('podcd',5)->nullable()->comment('卸货港代码(Discharge Port Code)');
            $table->dateTime('etd')->nullable()->comment('预计开航时间(Estimated departure time)');
            $table->dateTime('atd')->nullable()->comment('实际开航时间(Actual sailing time)');
            $table->dateTime('eta')->nullable()->comment('预计抵港时间(Estimated arrival time at port)');
            $table->dateTime('ata')->nullable()->comment('实际抵港时间(Actual arrival time at port)');
            $table->string('sno')->nullable();
            $table->string('type',2)->nullable()->comment('航程类型(2=驳船；无值或者1=大船;3=陆运)');
        });

        Schema::create('ydn_tracking_ctnrinfos', function (Blueprint $table) {
            $table->id();
            $table->string('keyid')->unique();
            $table->string('fkeyid');
            $table->foreignId('ydn_tracking_id')->constrained('ydn_tracking');
            $table->string('ctnrno',11)->nullable()->comment('箱号(Container Number)');
            $table->string('blno',36)->nullable()->comment('提单号(Bill of lading number)');
            $table->string('sealno',18)->nullable()->comment('铅封号(Lead seal number)');
            $table->string('csize',3)->nullable()->comment('尺寸(size)');
            $table->string('ctype',3)->nullable()->comment('箱型(Container type)');
            $table->string('pkgs',18)->nullable()->comment('件数(Number of pieces)');
            $table->string('gwgt')->nullable()->comment('毛重(Gross weight)');
            $table->string('currentnode',18)->nullable()->comment('当前节点(Current node)');
            $table->dateTime('currentnodetime')->nullable()->comment('当前节点时间(Current node time)');
            $table->dateTime('createtime')->nullable()->comment('创建时间(Creation time)');
            $table->dateTime('updatetime')->nullable()->comment('更新时间(Update time)');
        });

        Schema::create('ydn_tracking_status', function (Blueprint $table) {
            $table->id();
            $table->string('keyid')->index();
            $table->string('fkeyid')->index();
            $table->foreignId('ydn_tracking_ctnrinfo_id')->constrained('ydn_tracking_ctnrinfos');
            $table->string('blno',64)->nullable()->comment('提单号(Bill of lading number)');
            $table->string('statuscd',8)->nullable()->comment('状态代码(Status Code)');
            $table->text('statedescription')->nullable()->comment('状态描述(Status Description)');
            $table->text('statedescription_en')->nullable()->comment('状态英文描述(English description of status)');
            $table->dateTime('statustime')->nullable()->comment('状态时间(State time)');
            $table->string('statusplace',164)->nullable()->comment('状态地点(Status location)');
            $table->string('statusplacecd',8)->nullable()->comment('状态地点代码(Status Location Code)');
            $table->string('statusplace_cn',164)->nullable()->comment('状态地点');
            $table->string('vslname',64)->nullable()->comment('船名(Ship name)');
            $table->string('voy',32)->nullable()->comment('航次(Voyage)');
            $table->string('isest',2)->nullable()->comment('是否预计时间（Y=是，N=否）');
            $table->string('cancelid',2)->nullable()->comment('无效标识（Y=已退载或甩柜）');
            $table->tinyInteger('sourcecd')->nullable()->comment('数据来源(data sources) 1=船东；2=码头；4=云当计算');
            $table->dateTime('updatetime')->nullable()->comment('更新时间(Update time)');
            $table->dateTime('createtime')->nullable()->comment('创建时间(Creation time)');
            $table->string('transportation',32)->nullable()->comment('运输方式');
            $table->string('transportationcd')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ydn_tracking_status');
        Schema::dropIfExists('ydn_tracking_ctnrinfos');
        Schema::dropIfExists('ydn_tracking_carriages');
        Schema::dropIfExists('ydn_tracking');
        Schema::dropIfExists('ydn_tracking_status_codes');
        Schema::dropIfExists('ydn_tracking_carriers');
    }
};